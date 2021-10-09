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

    public function store(Product $product)
    {
        if(!Auth::check()){
            return redirect('/login');
        }

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

    public function destroy(Product $product)
    {
        $cart = auth()->user()->cart;
        $cart->products()->detach($product->id);
        $cart->total_price -= $product->price * request()->input('quantity');
        $cart->products->count() ? $cart->save() : Cart::where('id', $cart->id)->forceDelete();
        return back();
    }
}
