<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function create()
    {
        return view('cart');
    }

    public function store(Product $product)
    {
        $user = auth()->user();
        $cart = $user->cart;
        if(!$cart)
        {
            $cart = new Cart;
            $cart->user_id = auth()->user()->id;
            $cart->save();
        }

        $input = request()->validate(['quantity' => 'required|numeric']);

        $cart->products()->attach($product->id, ['quantity' => $input['quantity']]);

        $cart->total_price += $product->price * $input['quantity'];

        $cart->save();

        return back();

    }

    public function delete(Product $product)
    {
        $cart = auth()->user()->cart;
        $cart->products()->detach($product->id);
        $cart->total_price -= $product->price * request()->input('quantity');
        $cart->save();
        return back();
    }
}
