<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('create_category.index', compact('categories'));
    }

    public function create()
    {
        return view('create_category.create');
    }

    public function store(Request $request)
    {
        $categories = new Category();
        $categories->name = $request->name;
        $categories->description = $request->description;
        $categories->save();

        return redirect()->route('categories');
    }

    public function show($category)
    {
        $category = Category::with('evaluations')->findOrFail($category);
        return view('create_category.show', compact('category'));
    }

    public function edit($category)
    {
        $category = Category::find($category);
        return view('create_category.edit', compact('category'));
    }

    public function update(Request $request, $category)
    {
        $category = Category::find($category);

        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect()->route('categories');
    }

    public function destroy($category)
    {
        $category = Category::find($category);
        $category->delete();
        return redirect()->route('categories');
    }
}
