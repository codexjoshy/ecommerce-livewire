<?php

namespace App\Http\Livewire\Frontend\Wishlist;

use App\Models\Product;
use App\Models\Whishlist;
use App\Services\ProductService;
use Livewire\Component;

class Index extends Component
{
    public $products = [];
    protected $listeners = ["addToCart" => 'addToCart'];
    public function addToCart($productId)
    {
        $added = ProductService::addProductToCart($productId, 1);
        if ($added) {
            $this->emit('cart-added');
            $this->emit('updateWislistCount');
            $this->dispatchBrowserEvent('browser-alert', ["status" => "success", "message" => "✅Product added successfully to cart🛒"]);
        }
    }

    public function render()
    {
        if ($userId = auth()->id()) {
            // $wishlists = Whishlist::with('products')->where("user_id", $userId)->get();
            $productIds = Whishlist::select('product_id')->where(['user_id' => $userId, 'in_cart' => false])->pluck('product_id');
            if ($productIds) {
                $this->products = Product::whereIn('id', $productIds)->get();
            }
        }
        return view('livewire.frontend.wishlist.index', ['products' => $this->products]);
    }
}
