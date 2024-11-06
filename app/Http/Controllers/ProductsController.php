<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function store(Request $request)
    {
        $categories = Category::with('children')->get();
    
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
    
        // Preserve sort and page parameters in the query string
        $products->appends(['sort' => $sort]);
    
        return view('products.store', [
            'products' => $products,
            'categories' => $categories,
            'totalProducts' => Product::count(), // Total count of products

        ]);
    }
    public function show(Request $request, $slug)
    {
        // Find the product by slug
        $product = Product::where('slug', $slug)->firstOrFail();

        // Get the categories the product belongs to
        $categoryIds = $product->categories()->pluck('categories.id');

        // Fetch related products from the same categories, ordered by most recent and limit to 4
        $relatedProducts = Product::whereHas('categories', function ($query) use ($categoryIds) {
            $query->whereIn('categories.id', $categoryIds);
        })
        ->where('active', true)
        ->where('id', '!=', $product->id)
        ->orderBy('created_at', 'desc') // Order by most recent
        ->limit(4) // Limit to 4 products
        ->get();
        return view('products.one', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }



}
