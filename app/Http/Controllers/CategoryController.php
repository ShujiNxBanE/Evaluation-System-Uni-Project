<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(10);
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
        // Cargamos la categoría con las evaluaciones y las evidencias anidadas
        $category = Category::with(['evaluations.evidences'])->findOrFail($category);

        // Verificamos si alguna de las evaluaciones tiene al menos una evidencia
        $hasEvidences = $category->evaluations->contains(function ($evaluation) {
            return $evaluation->evidences->isNotEmpty();
        });

        return view('create_category.show', compact('category', 'hasEvidences'));
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
