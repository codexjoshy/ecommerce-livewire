<?php

namespace App\Http\Livewire\Frontend\Products;

use App\Models\Product;
use App\Services\ProductService;
use Livewire\Component;

class Index extends Component
{

    public $products, $categories, $selectedCategory = [], $priceInput = "";
    protected $listeners = ["addToCart" => 'addToCart'];
    public function addToCart($productId)
    {
        $added = ProductService::addProductToCart($productId, 1);
        if ($added) {
            $this->emit('cart-added');
            $this->dispatchBrowserEvent('browser-alert', ["status" => "success", "message" => "✅Product added successfully to cart🛒"]);
        }
    }

    protected $queryString = [
        // 'selectedCategory' => ['keep' => true],
        'selectedCategory' => ['except' => '', 'as' => 'cat'],
        'priceInput' => ['except' => '', 'as' => 'price'],
    ];

    public function mount($categories)
    {
        $this->categories = $categories;
    }

    public function render()
    {

        $this->products = Product::when($this->selectedCategory, fn ($q) => $q->whereIn('category_id', $this->selectedCategory))
            ->when($this->priceInput == "high-to-low", function ($q) {
                return $q->orderByDesc('price');
            })
            ->when($this->priceInput == "low-to-high", function ($q) {
                return $q->orderBy('price');
            })
            ->limit('20')->get();
        if (!$this->priceInput) {
            $this->products->shuffle();
        }

        return view('livewire.frontend.products.index', ["products" => $this->products, "categories" => $this->categories]);
    }
}
