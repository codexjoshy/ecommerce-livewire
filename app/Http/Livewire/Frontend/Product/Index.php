<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Services\ProductService;
use Livewire\Component;

class Index extends Component
{
    public $categories;
    protected $listeners = ["addToCart" => 'addToCart'];
    public function addToCart($productId)
    {
        $added = ProductService::addProductToCart($productId, 1);
        if ($added) {
            $this->emit('cart-added');
            $this->dispatchBrowserEvent('browser-alert', ["status" => "success", "message" => "✅Product added successfully to cart🛒"]);
        }
    }


    public function mounted($categories)
    {
        // $this->categories = $categories;
    }
    public function render()
    {
        return view('livewire.frontend.product.index', ["categories" => $this->categories]);
    }
}
