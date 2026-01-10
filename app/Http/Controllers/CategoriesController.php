<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCategoriesRequest;
use App\Models\Categories;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    $user = auth()->user();
    $categories = Categories::where('user_id', $user->id)->get();

    return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    $user = auth()->user(); 

    return view('categories.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveCategoriesRequest $request)
    {
        //

    $data = $request->validated();

    // ensure the category is associated with the authenticated user
    $data['user_id'] = auth()->id();

    $category = Categories::create($data);

    return redirect()->route('categories.index', $category)->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $category)
    {
        //
    $user = auth()->user();
    return view('categories.index', compact('category', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $category)
    {
        //
    $user = auth()->user();

    return view('categories.edit', compact('category', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveCategoriesRequest $request, Categories $category)
    {
        //
    $data = $request->validated();

    $category->update($data);

    return redirect()->route('categories.index', $category)->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $category)
    {
        //
    $category->delete();
    return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
