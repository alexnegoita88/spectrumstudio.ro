<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\File; // Importă facade-ul File
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Log;
use Spatie\Crawler\Crawler;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;
use Str;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the website sitemap in xml format';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Folosește config('app.url'), e mai sigur decât env() direct în cod
        $appUrl = config('app.url');
        if (!$appUrl) {
             $this->error('APP_URL is not set in your .env file or config/app.php.');
             Log::error('APP_URL is not set. Cannot generate sitemap.');
             return Command::FAILURE;
        }

        // Definește calea fișierului sitemap *potențial* existent
        // Folosim un model generic aici pentru verificare, înainte de a crea cel cu data curentă
        // Presupunem că vrei să ștergi *orice* sitemap mai vechi de o lună, indiferent de data din nume.
        // Dacă vrei să ștergi DOAR fișierul cu o anumită dată, logica e mai complexă.
        // Aici vom căuta *toate* fișierele `sitemap_*.xml` și le vom șterge dacă sunt > 1 lună.

        $sitemapDirectory = public_path('/'); // Directorul public
        $sitemapFilePattern = 'sitemap_*.xml'; // Modelul numelui fișierului

        $oneWeekAgoTimestamp = Carbon::now()->subWeek()->timestamp;

        // Găsește toate fișierele sitemap existente care se potrivesc modelului
        $existingSitemaps = File::glob($sitemapDirectory . $sitemapFilePattern);

        if (!empty($existingSitemaps)) {
            $this->info('Checking for old sitemap files...');
            foreach ($existingSitemaps as $existingSitemapPath) {
                try {
                    // Verifică dacă fișierul există (glob poate returna căi chiar dacă sunt șterse între timp)
                    if (File::exists($existingSitemapPath)) {
                        $fileLastModifiedTimestamp = File::lastModified($existingSitemapPath);

                        // Compară timestamp-ul fișierului cu cel de acum o saptamana
                        if ($fileLastModifiedTimestamp < $oneWeekAgoTimestamp) {
                            File::delete($existingSitemapPath);
                            $deletedFileName = basename($existingSitemapPath);
                            $this->warn("Deleted old sitemap file (older than 1 week): {$deletedFileName}");
                            Log::info("Deleted old sitemap file: {$existingSitemapPath}");
                        } else {
                             Log::debug("Keeping sitemap file (not older than 1 week): " . basename($existingSitemapPath));
                        }
                    }
                } catch (\Exception $e) {
                    $this->error("Failed to check or delete old sitemap file '{$existingSitemapPath}': " . $e->getMessage());
                    Log::error("Failed to check or delete old sitemap file '{$existingSitemapPath}': " . $e->getMessage());
                    // Continuăm cu celelalte fișiere vechi și cu generarea noului sitemap
                }
            }
        } else {
             $this->info('No existing sitemap files found matching pattern.');
             Log::info('No existing sitemap files found matching pattern.');
        }


        // --- Generarea noului Sitemap (codul tău existent) ---
        // Definește calea EXACTĂ pentru noul fișier sitemap
        $newSitemapPath = public_path('sitemap_' . date('Y_m_d') . '.xml');

        $this->info("Generating new sitemap via crawler for {$appUrl}...");
        Log::info("Generating new sitemap via crawler at: {$newSitemapPath}"); // Folosim noua cale

        try {
            SitemapGenerator::create($appUrl)
                ->configureCrawler(function (Crawler $crawler) {
                    $crawler->ignoreRobots();
                })
                ->hasCrawled(function (Url $url) {
                    // --- Setează Last Modification Date ---
                    $url->setLastModificationDate(Carbon::now());

                    // --- Setează Prioritatea bazată pe calea URL ---
                    $path = parse_url($url->url, PHP_URL_PATH) ?? '/';

                    // Excludere explicită (înainte de a seta prioritate etc.)
                     if (Str::contains($path, ['/uploads', '/legal'])) { // Adaugă /legal înapoi aici dacă vrei să excluzi
                         Log::debug("Excluding URL based on path: {$path}");
                         return null; // Exclude URL-ul
                     }


                    // Setează priorități
                    if ($path === '/') {
                        $url->setPriority(1.0);
                    } elseif (Str::startsWith($path, ['/product/', '/news/', '/project/'])) {
                        $url->setPriority(0.9);
                    } elseif (Str::startsWith($path, ['/products', '/news', '/projects', '/category/'])) {
                        $url->setPriority(0.8);
                    } elseif (Str::startsWith($path, '/categories')) {
                        $url->setPriority(0.7);
                     } elseif ($path === '/about') {
                        $url->setPriority(0.5);
                     } elseif ($path === '/contact') {
                        $url->setPriority(0.3);
                    // Scoatem excluderea pentru /legal de aici dacă o facem mai sus
                    // } elseif (Str::startsWith($path, '/legal')) {
                    //     $url->setPriority(0.1);
                     } else {
                        $url->setPriority(0.5);
                    }

                    // --- Optional: Setează Change Frequency ---
                    if ($path === '/' || Str::startsWith($path, '/news')) {
                        $url->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY);
                    } elseif (Str::startsWith($path, ['/product', '/products', '/projects', '/category', '/categories'])) {
                         $url->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY);
                    } else {
                         $url->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY);
                    }

                    // IMPORTANT: Returnează obiectul $url modificat pentru a fi inclus
                    return $url;
                })
                ->writeToFile($newSitemapPath); // Scrie în noua cale

            $this->info("Sitemap generated successfully via crawler at {$newSitemapPath}"); // Folosim noua cale
            Log::info("Sitemap generation via crawler finished successfully.");

            return Command::SUCCESS;

        } catch (\Exception $e) {
             $this->error("Sitemap generation via crawler failed: " . $e->getMessage());
             Log::error("Sitemap generation via crawler failed: " . $e->getMessage(), ['exception' => $e]);
             return Command::FAILURE;
        }
    }



    
}
