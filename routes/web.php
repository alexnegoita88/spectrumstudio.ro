<?php

use App\Http\Controllers\HomeController;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [HomeController::class, 'index']);
