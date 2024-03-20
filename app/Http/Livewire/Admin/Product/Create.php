<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
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
    public function render()
    {
        $categories = Category::latest()->get();
        return view('livewire.admin.product.create', compact('categories'))
            ->extends('layouts.admin')
            ->section('content');
    }
}
