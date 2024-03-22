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
}
