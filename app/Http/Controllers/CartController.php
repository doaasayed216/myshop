<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        return view('cart');
    }

    public function store(Request $request, Product $product)
    {
        $cart = auth()->user()->cart ?? Cart::create(['user_id' => auth()->id()]);
        $input = $request->validate(['quantity' => 'required|numeric']);
        $cart->products()->attach($product->id, ['quantity' => $input['quantity']]);
        $cart->update([
            'total_price' => $cart->total_price += $product->price * $input['quantity']
        ]);
        return back();
    }

    public function destroy(Product $product)
    {
        $cart = auth()->user()->cart;
        $quantity = $cart->getProduct($product->id)->pivot->quantity;

        $cart->products()->detach($product->id);

        if(!$cart->products()->count()) {
            Cart::where('id', $cart->id)->forceDelete();
            return back();
        }

        $cart->update([
            'total_price' => $cart->total_price -= $product->price * $quantity
        ]);
        return back();
    }
}
