<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class Index extends Component
{
    public $categories;

    public function mounted($categories)
    {
        // $this->categories = $categories;
    }
    public function render()
    {
        return view('livewire.frontend.product.index', ["categories" => $this->categories]);
    }
}
