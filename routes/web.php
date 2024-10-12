<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProjectsController;
use App\Models\FormSubmission;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/categories/all', [CategoriesController::class, 'all'])->name('categories_all');
Route::get('/category/{slug}', [CategoriesController::class, 'one'])->name('category');

Route::get('/products/store', [ProductsController::class, 'store'])->name('products_store');
Route::get('/product/{slug}', [ProductsController::class, 'show'])->name('product');


Route::get('/projects', [ProjectsController::class, 'index'])->name('projects_all');
Route::get('/projects/{slug}', [ProjectsController::class, 'show'])->name('projects_show');

Route::get('/news', [NewsController::class, 'index'])->name('news_all');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news_show');
Route::get('/news/author/{author}', [NewsController::class, 'author'])->name('news_author');


Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/contact/view', function () {
    return view('emails.contact_admin',['data' => FormSubmission::orderBy('id', 'desc')->first(), 'name' => "Johnny", 'content' => "Un utilizator a completat formularul de contact din site."]);
    // return view('emails.contact_client',['content' => "Multumim pentru contact", 'name' => "Johnny"]);
});

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit')->middleware('throttle:2,1'); // 2 requests per minute

Route::prefix('legal')->group(function () {
    Route::get('/terms',  [LegalController::class, 'tandc'])->name('terms');
});


Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter_subscribe');//->middleware('throttle:2,1'); // 2 requests per minute;
Route::get('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter_subscribe');//->middleware('throttle:2,1'); // 2 requests per minute;
Route::get('/newsletter/successful_subscription', [NewsletterController::class, 'successful_subscribe'])->name('successful_subscription');
Route::get('/newsletter/unsubscribe', [NewsletterController::class, 'unsubscribe'])->name('newsletter_unsubscribe');//->middleware('throttle:2,1'); // 2 requests per minute;
Route::get('/newsletter/successful_unsubscription', [NewsletterController::class, 'successful_unsubscribe'])->name('successful_unsubscription');
