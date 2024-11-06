<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Project;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = trim($request->get("query"));

        $results['products'] = Product::where('name','like','%'.$search.'%')->orWhere('description','like','%'.$search.'%')->orWhere('slug','like','%'.$search.'%')->get();
        $results['categories'] = Category::where('name','like','%'.$search.'%')->orWhere('description','like','%'.$search.'%')->orWhere('slug','like','%'.$search.'%')->get();
        $results['projects'] = Project::where('title','like','%'.$search.'%')->orWhere('body','like','%'.$search.'%')->orWhere('slug','like','%'.$search.'%')->get();

        return view("search.index", [
            'results' => $results
        ]);
    }
}
