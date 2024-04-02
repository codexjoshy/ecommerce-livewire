<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Whishlist;
use App\Services\ProductService;
use Illuminate\Http\Request;

class WhishListController extends Controller
{
    public function index()
    {
        $products = [];

        return view("frontend.wishlist");
    }

    function cartView()
    {

        return view("frontend.cart");
    }
}
