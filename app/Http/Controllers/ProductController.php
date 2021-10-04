<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index', ['products' => Product::paginate(10)]);
    }

    public function create()
    {
        return view('admin.products.create', ['categories' => Category::all()]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'name' => ['required', Rule::unique('products', 'name')],
            'description' => ['required'],
            'price' => ['required', 'numeric'],
            'img_path' => ['required', 'image']
        ]);

        $attributes['img_path'] = $request->file('img_path')->store('products_images');

        $product = Product::create($attributes);
        $product->code = '#'. implode('', explode(' ', $product->name))  . $product->id . $product->category_id;
        $product->save();
        return back();
    }

    public function show(Product $product)
    {
        return view('product', [
            'product' => $product
        ]);
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    public function update(Product $product)
    {
        $attributes = request()->validate([
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required', 'numeric'],
            'img_path' => ['image']
        ]);

        $product->update($attributes);

        return back();
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
}
