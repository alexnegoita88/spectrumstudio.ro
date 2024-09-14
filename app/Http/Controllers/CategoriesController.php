<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function all()
    {
        /*
        /   Shows all categories
        */
        return view('categories.all', [
            'categories' => Category::all()
        ]);
    }

    /*
    /   Shows all the products from a specific category
    */
    public function one(Request $request)
    {
        // Find the category by the slug from the request
        $category = Category::where('slug', $request->slug)->firstOrFail();
    
        // Get all categories and their children
        $categories = Category::with('children')->get();
    
        // Get IDs of the selected category and its child categories
        $categoryIds = $this->getCategoryIds($category);
    
        // Retrieve all products associated with the selected category and its children
        $products = Product::whereHas('categories', function ($query) use ($categoryIds) {
            $query->whereIn('categories.id', $categoryIds);
        })->where('active', true)->paginate(9);
    


        $sort = $request->query('sort', 'date_desc'); // Default to sorting by newest
        $page = $request->query('page', 1); // Default to page 1
    
        switch ($sort) {
            case 'price':
                $products = Product::where('active', true)->orderBy('price')->paginate(9);
                break;
            case 'price_desc':
                $products = Product::where('active', true)->orderBy('price', 'desc')->paginate(9);
                break;
            case 'name':
                $products = Product::where('active', true)->orderBy('name', 'asc')->paginate(9);
                break;
            case 'date':
                $products = Product::where('active', true)->orderBy('created_at', 'asc')->paginate(9);
                break;
            default:
                $products = Product::where('active', true)->orderBy('created_at', 'desc')->paginate(9);
                break;
        }

        
        return view('categories.one', [
            'products' => $products,
            'category' => $category,
            'categories' => $categories,
        ]);
    }
    
    private function getCategoryIds(Category $category)
    {
        // Get the IDs of the selected category and its children
        $categoryIds = $category->children->pluck('id')->toArray();
        $categoryIds[] = $category->id;
        
        return $categoryIds;
    }
}
