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
        return view('categories.all_new', [
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
    
        // Retrieve all products associated with the selected category and its children, with initial filtering and sorting
        $productsQuery = Product::whereHas('categories', function ($query) use ($categoryIds) {
                $query->whereIn('categories.id', $categoryIds);
            })
            ->where('active', true);
    
        // Sort based on the request's 'sort' parameter
        $sort = $request->query('sort', 'date_desc'); // Default to sorting by newest
    
        switch ($sort) {
            case 'price':
                $productsQuery->orderBy('price');
                break;
            case 'price_desc':
                $productsQuery->orderBy('price', 'desc');
                break;
            case 'name':
                $productsQuery->orderBy('name', 'asc');
                break;
            case 'date':
                $productsQuery->orderBy('created_at', 'asc');
                break;
            default:
                $productsQuery->orderBy('created_at', 'desc');
                break;
        }
    
        // Paginate the sorted products query
        $products = $productsQuery->paginate(9);
    
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
