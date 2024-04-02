<?php

namespace App\Http\Livewire\Frontend\Wishlist;

use App\Models\Product;
use App\Services\ProductService;
use Livewire\Component;

class Cart extends Component
{
    public $carts, $totalPrice = 0;
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

    public function removeCart($productId)
    {
        try {
            $removed = ProductService::removeProductFromCart($productId);
            if ($removed) {
                $this->emit('cart-added');
                $this->dispatchBrowserEvent('browser-alert', ["status" => "success", "message" => "✅Product removed from cart🛒"]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            $this->dispatchBrowserEvent('browser-alert', ["status" => "error", "message" => $th->getMessage()]);
        }
    }
    public function increment($wishListId)
    {
        $this->carts = collect($this->carts)->map(function ($wishList) use ($wishListId) {
            if ($wishList->id == $wishListId) {
                $wishList->quantity = $wishList->quantity + 1;
                $wishList->save();
            }
            return $wishList;
        });
    }

    public function decrement($wishListId)
    {
        $this->carts = collect($this->carts)->map(function ($wishList) use ($wishListId) {
            if ($wishList->id == $wishListId) {
                $wishList->quantity = $wishList->quantity - 1;
                if ($wishList->quantity >= 1) $wishList->save();
            }
            return $wishList;
        });
    }

    public function render()
    {
        $productService = new ProductService;

        $this->carts =  ProductService::getCartProduct();
        $productIds = optional($this->carts)->pluck('product_id');
        $mostViewed = Product::when($productIds, fn ($q) => $q->whereNotIn('id', $productIds))
            ->inRandomOrder()->take(6)->get();
        return view('livewire.frontend.wishlist.cart', ['wishlists' => $this->carts, 'productService' => $productService, 'mostViewed' => $mostViewed]);
    }
}
