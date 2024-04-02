<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use App\Models\Whishlist;
use App\Services\ProductService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use NumberFormatter;

class Show extends Component
{
    public $category, $product, $productCount = 1, $price, $wishList;

    protected $listeners = ["addToCart" => 'addToCart'];
    public function addToCart($productId)
    {
        $added = ProductService::addProductToCart($productId, $this->productCount);
        if ($added) {
            $this->emit('cart-added');
            $this->dispatchBrowserEvent('browser-alert', ["status" => "success", "message" => "✅Product added successfully to cart🛒"]);
        }
    }

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
        $this->price = floatval($product->price);
        $this->productCount = optional($this->wishList)->quantity ?? 1;
    }

    public function addToWishList(int $productId)
    {
        if (!Auth::check()) {
            // session()->flash('error', 'Please login to add to wish list');
            $this->dispatchBrowserEvent('browser-alert', ["status" => "error", "message" => "Please login to add to wish list"]);
            return;
        }
        if (!Product::where('id', $productId)->exists()) {
            // session()->flash('error', 'sorry product has been removed my the owner');
            $this->dispatchBrowserEvent('browser-alert', ["status" => "error", "message" => "sorry product has been removed my the owner"]);

            return;
        }
        if ($this->wishList) {
            // session()->flash('error', 'sorry product already in wishlist');
            $this->dispatchBrowserEvent('browser-alert', ["status" => "error", "message" => "sorry product already in wishlist"]);
            return;
        }
        $wish = new Whishlist;
        $wish->user_id = auth()->id();
        $wish->product_id = $productId;
        $wish->quantity = $this->productCount;
        if ($wish->save()) {
            // session()->flash('success', 'product added successfully to wishlist 🚀');
            $this->dispatchBrowserEvent('browser-alert', ["status" => "success", "message" => "product added successfully to wishlist 🚀"]);
            $this->wishList = $wish;

            //dispatch counter event
            $this->emit('updateWislistCount');
        }
    }

    public function removeFromWishList(int $productId)
    {
        if (!Auth::check()) {
            // session()->flash('error', 'Please login to add to wish list');
            $this->dispatchBrowserEvent('browser-alert', ["status" => "error", "message" => "Please login to add to wish list"]);

            return;
        }
        if (!Product::where('id', $productId)->exists()) {
            // session()->flash('error', 'sorry product has been removed my the owner');
            $this->dispatchBrowserEvent('browser-alert', ["status" => "error", "message" => "sorry product has been removed my the owner"]);
            return;
        }
        if (!$this->wishList) {
            session()->flash('error', 'sorry product does not exist in wishlist');
            return;
        }
        $wish = Whishlist::where(['product_id' => $productId, 'user_id' => auth()->id()])->delete();
        if ($wish) {
            // $list = collect($this->wishLists)->filter(fn ($item) => $item != $productId)->toArray();
            $this->wishList = null;
            // session()->flash('success', 'product removed successfully from wishlist');
            $this->dispatchBrowserEvent('browser-alert', ["status" => "success", "message" => "Successfully removed successfully from wishlist  🚀"]);

            //dispatch counter event
            $this->emit('updateWislistCount');
        }
    }



    public function currencyFormat($value)
    {
        $fmt = new NumberFormatter('en_US', NumberFormatter::DECIMAL);
        return $fmt->format($value);
    }
    public function increment()
    {
        $this->productCount++;
        $this->price = floatval($this->product->price) * $this->productCount;
    }

    public function decrement()
    {

        if ($this->productCount > 1) $this->productCount--;
        $this->price =  $this->productCount * $this->product->price;
    }
    public function render()
    {
        if (Auth::check()) {
            $wish = Whishlist::where(['user_id' => auth()->id(), 'product_id' => $this->product->id, 'in_cart' => false])->first();
            $this->wishList = $wish;
            $this->productCount = optional($wish)->quantity ?? $this->productCount;
        }
        return view('livewire.frontend.product.show', ["category" => $this->category, "product" => $this->product,]);
    }
}
