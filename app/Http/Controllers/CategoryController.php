<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use phpseclib3\Crypt\Rijndael;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::filter(request(['search']))->paginate(20)
        ]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        Category::create($request->validate(['name' => 'required|unique:categories,name']));
        return back();
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->validate(['name' => 'required']));
        return back();
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
}
