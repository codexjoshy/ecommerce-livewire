<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();
        $mostViewed = Product::inRandomOrder()->take(5)->get();
        return view('frontend.index', compact('categories', 'mostViewed'));
    }

    public function products()
    {
        $categories = Category::with('products')->get();

        return view('frontend.products.index', compact('categories'));
    }

    public function product(string $categorySlug, Product $product)
    {
        $category = Category::where('slug', $categorySlug)->exists();
        if (!$category) return back()->with('error', 'Invalid category');

        return view('frontend.products.show', compact('category', 'product'));
    }
}
