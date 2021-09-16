<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', ['categories' => Category::paginate(10)]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', Rule::unique('categories', 'name')],
        ]);

        Category::create($attributes);

        return back();
    }

    public function add(Category $category)
    {
        return view('admin.categories.add', ['category' => $category]);
    }

    public function storeChild(Category $category)
    {
        $attributes = request()->validate([
            'name' => ['required', Rule::unique('categories', 'name')]
        ]);

        Category::create(array_merge($attributes , [
            'parent_id' => $category->id
        ]));

        return back();
    }
}
