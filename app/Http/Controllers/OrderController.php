<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.orders', [
            'orders' => Order::all()
        ]);
    }
    public function create()
    {
        return view('success', [
            'address' => Address::find(session('address'))
        ]);
    }
    public function store()
    {
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'cart_id' => auth()->user()->cart->id,
            'address_id' => session('address'),
            'shipping' => session('shipping'),
        ]);

        if(session()->has('cash'))
        {
            $order->cash = true;
        }

        else {
            $order->payment_id = auth()->user()->payment->id;
        }

        $cart = Cart::find($order->cart_id);

        $order->items = $cart->products;
        $order->total = $cart->total_price + $order->shipping + ($order->cash ? 5 : 0);

        $order->save();

        $cart->delete();

        return view('good');

    }

    public function destroy(Order $order)
    {
        Cart::where('id', $order->cart_id)->restore();
        $order->delete();
        return back();
    }

    public function update(Order $order)
    {
        $order->delivered = true;
        $order->save();
        return back();
    }
}
