<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::withCount('products')->get();
        return view("admin.category.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $category = null;
        return view("admin.category.create", compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        try {
            $validated = $request->validated();
            ["status" => $status] = $validated;

            if ($request->file('image')) {
                $file = $request->file('image');
                $validated['image'] = time() . ".{$file->getClientOriginalExtension()}";
                $file->move("uploads/category", $validated['image']);
            }
            $validated['status'] = $status == "active" ? '1' : '0';
            Category::create($validated);
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }

        return back()->with('success', "Category created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $categoryProducts = $category->load('products');
        return view('admin.category.show', compact('category', 'categoryProducts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.create', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();
        $category->title = $validated['title'];
        $category->slug = $validated['slug'];
        $category->description = $validated['description'];
        if ($request->file('image')) {
            $file = $request->file('image');
            $validated['image'] = time() . ".{$file->getClientOriginalExtension()}";
            $file->move("uploads/category", $validated['image']);
            $category->image = $validated['image'];
        }
        $category->save();
        return back()->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (!Gate::allows('admin')) {
            return back()->with('error', 'Access denied');
        }

        $category->delete();
        return back()->with('success', 'Category deleted successfully');
    }
}
