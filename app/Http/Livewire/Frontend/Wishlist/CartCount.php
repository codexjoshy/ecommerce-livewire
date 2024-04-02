<?php

namespace App\Http\Livewire\Frontend\Wishlist;

use App\Services\ProductService;
use Livewire\Component;

class CartCount extends Component
{
    protected $listeners = ["cart-added" => "updateCartCount"];
    public $count = 0;

    public function updateCartCount()
    {
        $this->count = count(ProductService::getCartProduct() ?? []);
    }
    public function render()
    {
        $this->count = count(ProductService::getCartProduct() ?? []);
        return view('livewire.frontend.wishlist.cart-count', ["count" => $this->count]);
    }
}
