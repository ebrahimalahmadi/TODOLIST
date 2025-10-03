<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('pages.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {

        $category = Category::create($request->validated());
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
        $category->update($request->validated());
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // this method is to prevent deletion of category if it has associated tasks
        if ($category->tasks()->count() > 0) {
            return redirect()->route('categories.index')->with('error', 'Cannot delete category with associated tasks.');
        }
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}


    // test the success toastr notification
    // session()->flash('success', 'Category created successfully.');
    // test the warning toastr notification
    // session()->flash('warning', 'warning Category successfully.');
    // test the error toastr notification
    // session()->flash('error', 'error Category successfully.');
    // test the info toastr notification
    // session()->flash('info', 'info Category successfully.');