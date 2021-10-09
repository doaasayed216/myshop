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
        $this->authorize('viewAny', Category::class);
        return view('admin.categories.index', [
            'categories' => Category::filter(request(['search']))->paginate(20)
        ]);
    }

    public function create()
    {
        $this->authorize('create', Category::class);
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Category::class);
        Category::create($this->validateCategory($request));
        return back();
    }


    public function show(Category $category)
    {
        return view('categories.show', [
            'products' => $category->products,
            'category' => $category
        ]);
    }

    public function edit(Category $category)
    {
        $this->authorize('update', Category::class);
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        $this->authorize('update', Category::class);
        $category->update($this->validateCategory($request, $category));
        return back();
    }

    public function destroy(Category $category)
    {
        $this->authorize('update', Category::class);
        $category->delete();
        return back();
    }

    protected function validateCategory(Request $request, ?Category $category= null)
    {
        $category ?? new Category();
        return $request->validate([
            'name' => ['required', Rule::unique('categories', 'name')->ignore($category)]
        ]);
    }
}
