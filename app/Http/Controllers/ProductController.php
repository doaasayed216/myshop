<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Product::class);
        return view('admin.products.index', [
            'products' => request()->user()->role_id == Role::IS_ADMIN ?
                Product::filter(request(['category', 'search', 'price']))->paginate(20) :
                Product::where('user_id', request()->user()->role_id)->filter(request(['category', 'search', 'price']))->paginate(20),
            'categories' => Category::all(),
            'currentCategory' => Category::firstWhere('id', request('category')),
            'max' => DB::table('products')->max('price')
        ]);
    }

    public function create()
    {
        $this->authorize('create', Product::class);
        return view('admin.products.create', ['categories' => Category::all()]);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Product::class);
        $attributes = array_merge($this->validateProduct($request), [
            'img_path' => $request->file('img_path')->store('products_images'),
            'user_id' => auth()->user()->id
        ]);

        $product = Product::create($attributes);
        $product->code = '#'. implode('', explode(' ', $product->name))  . $product->id . $product->category_id;
        $product->save();
        return back();
    }

    public function show(Product $product)
    {
        return view('product', [
            'product' => $product,
            'reviews' => Review::where('product_id', $product->id)->get()
        ]);
    }

    public function edit(Product $product)
    {
        $this->authorize('update', $product);
        if(request()->user()->cannot('update', $product)) {
            abort(403);
        }
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $this->authorize('update', $product);
        $attributes = array_merge($this->validateProduct($request, $product), [
            'user_id' => auth()->user()->id
        ]);

        if(isset($attributes['img_path'])) {
            $attributes['img_path'] = $request->file('img_path')->store('products_images');
        }

        $product->update($attributes);
        return back();
    }

    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);
        $product->delete();
        return back();
    }

    public function validateProduct(Request $request, ?Product $product = null)
    {
        $product ?? new Product();
        return $request->validate([
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'name' => ['required', Rule::unique('products', 'name')->ignore($product)],
            'description' => ['required'],
            'price' => ['required', 'numeric'],
            'img_path' => $product ? 'image' : 'required|image'
        ]);
    }
}
