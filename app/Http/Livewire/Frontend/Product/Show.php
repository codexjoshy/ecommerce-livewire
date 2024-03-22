<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class Show extends Component
{
    public $category, $product, $productCount = 1, $price;

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
        $this->price = floatval($product->price);
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

        return view('livewire.frontend.product.show', ["category" => $this->category, "product" => $this->product,]);
    }
}
