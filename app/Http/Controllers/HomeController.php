<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        return view('home.index', [
            'posts' => Post::where('active', 1)->limit(4)->orderByDesc('created_at')->get(),
            'categories' =>  Category::orderByDesc('updated_at')->limit(4)->get()
        ]);
    }
}
