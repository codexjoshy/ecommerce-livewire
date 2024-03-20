<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Show extends Component
{
    public $category, $products;

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->products = $category->products;
    }
    public function render()
    {
        return view('livewire.category.show');
    }
}
