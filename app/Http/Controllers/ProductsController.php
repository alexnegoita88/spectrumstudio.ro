<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function all()
    {
        return view('products.all');
    }
    public function store()
    {
        return view('products.store');
    }

    public function one()
    {
        return view('products.one');
    }
}
