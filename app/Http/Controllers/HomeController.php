<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        return view('home.index', [
            'categories' =>  Category::orderByDesc('updated_at')->limit(3)->get()
        ]);
    }
}
