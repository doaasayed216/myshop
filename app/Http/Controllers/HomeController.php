<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'categories' => Category::all(),
            'products' => Product::filter(request(['search', 'category', 'price']))
                ->orderByDesc('created_at')->paginate(30)
        ]);
    }
}
