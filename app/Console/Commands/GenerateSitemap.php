<?php

namespace App\Console\Commands;

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

        $mainSitemapPath = public_path('sitemap_' .  date('Y_m_d').'.xml');

        $this->info("Generating sitemap via crawler for {$appUrl}...");
        Log::info("Generating sitemap via crawler at: {$mainSitemapPath}");

        try {
            SitemapGenerator::create($appUrl)
                ->configureCrawler(function (Crawler $crawler) {
                    $crawler->ignoreRobots();
                    // Poți adăuga alte configurări pentru crawler aici dacă e necesar
                    // De ex: $crawler->setMaximumDepth(5);
                    // De ex: $crawler->setDelayBetweenRequests(100); // ms
                })
                ->hasCrawled(function (Url $url) {
                    // --- Setează Last Modification Date ---
                    // Cea mai bună opțiune aici este data curentă, deși nu e ideal.
                    $url->setLastModificationDate(Carbon::now());

                    // --- Setează Prioritatea bazată pe calea URL ---
                    // Extrage calea din URL (ex: '/news/my-article')
                    $path = parse_url($url->url, PHP_URL_PATH) ?? '/'; // Default to '/' if parse fails

                    // Setează priorități bazate pe segmente de URL (ajustează după nevoie)
                    if ($path === '/') {
                        $url->setPriority(1.0); // Homepage - cea mai mare prioritate
                    } elseif (Str::startsWith($path, ['/product/', '/news/', '/project/'])) {
                        // Pagini individuale de produs/știre/proiect - prioritate mare
                        $url->setPriority(0.9);
                    } elseif (Str::startsWith($path, ['/products', '/news', '/projects', '/category/'])) {
                         // Pagini de listare sau categorii individuale - prioritate medie-mare
                        $url->setPriority(0.8);
                    } elseif (Str::startsWith($path, '/categories')) {
                         // Pagina generală de categorii
                         $url->setPriority(0.7);
                     } elseif ($path === '/about') {
                         $url->setPriority(0.5);
                     } elseif ($path === '/contact') {
                         $url->setPriority(0.3);
                    } elseif (Str::startsWith($path, '/legal')) {
                         $url->setPriority(0.1); // Pagini legale - prioritate mică
                     } else {
                        // Prioritate default pentru orice altă pagină găsită
                        $url->setPriority(0.5);
                    }

                    // --- Optional: Setează Change Frequency ---
                    // Poți aplica o logică similară și pentru frecvența schimbărilor
                    if ($path === '/' || Str::startsWith($path, '/news')) {
                        $url->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY);
                    } elseif (Str::startsWith($path, ['/product', '/products', '/projects', '/category', '/categories'])) {
                         $url->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY);
                    } else {
                         $url->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY);
                    }


                    // Dacă vrei să EXCLUZI un URL, poți returna null:
                    if (Str::contains($path, ['/uploads', '/legal'])) {
                        return null;
                    }

                    // IMPORTANT: Returnează obiectul $url modificat pentru a fi inclus
                    return $url;

                    
                })
                ->writeToFile($mainSitemapPath);

            $this->info("Sitemap generated successfully via crawler at {$mainSitemapPath}");
            Log::info("Sitemap generation via crawler finished successfully.");

            return Command::SUCCESS;

        } catch (\Exception $e) {
             $this->error("Sitemap generation via crawler failed: " . $e->getMessage());
             Log::error("Sitemap generation via crawler failed: " . $e->getMessage(), ['exception' => $e]);
             return Command::FAILURE;
        }
    }


    
}
