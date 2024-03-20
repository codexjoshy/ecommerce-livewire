<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public function render()
    {
        // $categories = Category::latest()->paginate(10);
        $categories = Category::withCount('products')->get();
        return view('livewire.category.index', compact('categories'));
    }
}
