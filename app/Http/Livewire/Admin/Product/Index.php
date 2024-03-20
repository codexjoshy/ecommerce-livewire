<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    public $name, $price, $description, $image, $category_id, $productId;

    public function rules()
    {
        return [
            "name" => "required|string",
            "price" => "required|numeric",
            "description" => "required|string",
            "image" => "nullable|sometimes|image|mimes:png,jpg,jpeg,gif|max:1024",
            "category_id" => "required|integer|exists:categories,id",
        ];
    }

    protected function resetInputs()
    {
        $this->reset(['name', 'price', 'description', 'image', 'category_id']);
    }

    public function closeModal()
    {
        $this->resetInputs();
    }
    /**
     * used to create a new product
     */
    public function createProduct()
    {
        try {
            $valid = $this->validate();
            $fileName = $this->name . time();
            $path = $this->image ? $this->image->storePubliclyAs('public/products', "$fileName.png") : null;
            if ($path) $valid['image'] = ltrim($path, "public");
            Product::create($valid);
            $this->resetInputs();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', 'something went wrong in creating product' . $th->getMessage());
            return;
        }
        session()->flash('success', 'Product created successfully');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteProduct(int $productId)
    {
        try {
            $product = Product::findOrFail($productId);
            $product->delete();
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
        }
        session()->flash('deleted', 'Product has been deleted successfully');
        $this->resetInputs();
    }

    public function editProduct(int $productId)
    {
        $this->resetInputs();
        $product = Product::findOrFail($productId);
        if (!$product) {
            session()->flash('error', 'Post not found');
        }
        // $this->set('name', 'josh');
        $this->productId = $productId;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->description = $product->description;
        $this->category_id = $product->category_id;
    }

    public function updateProduct()
    {
        $validated = $this->validate();
        $fileName = $this->name . time();
        $path = $this->image ? $this->image->storePubliclyAs('public/products', "$fileName.png") : null;
        if ($path) $validated['image'] = ltrim($path, "public");
        Product::find($this->productId)->update($validated);
        session()->flash('success', 'Product has been updated successfully');
        $this->resetInputs();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $products = Product::latest()->get();
        $categories = Category::latest()->get();
        return view('livewire.admin.product.index', compact('products', 'categories'))
            ->extends('layouts.admin')
            ->section('content');
    }
}
