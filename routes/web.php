<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProjectsController;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/products/all', [ProductsController::class, 'all'])->name('products_all');
Route::get('/products/store', [ProductsController::class, 'store'])->name('products_store');
Route::get('/product/{slug}', [ProductsController::class, 'show'])->name('product');


Route::get('/projects', [ProjectsController::class, 'index'])->name('projects_all');
Route::get('/projects/{slug}', [ProjectsController::class, 'show'])->name('products_show');

Route::get('/news', [NewsController::class, 'index'])->name('news_all');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news_show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'processContact']);
