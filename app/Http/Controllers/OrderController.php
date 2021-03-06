<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderHistory;
use App\Models\Role;
use App\Policies\OrderPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.orders', [
            'orders' => Order::latest()->withTrashed()->filter(request(['search']))->paginate(10)
        ]);
    }

    public function create()
    {
        return view('order-review', [
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

        session('cash') ? $order->cash = true : $order->payment_id = auth()->user()->payment->id;

        $cart = Cart::find($order->cart_id);

        $order->items = $cart->products;
        $order->total = $cart->total_price + $order->shipping + ($order->cash ? 5 : 0);
        $order->save();

        $cart->delete();

        return view('success');
    }

    public function destroy(Order $order)
    {
        $this->authorize('delete', $order);
        Cart::where('id', $order->cart_id)->restore();
        tap($order, function ($order) {
            $order->update(['status' => 'cancelled']);
        })->delete();
        return back();
    }

    public function update(Order $order)
    {
        $this->authorize('update', $order);
        tap($order, function ($order) {
            $order->update(['status' => 'delivered']);
        })->delete();
        Cart::where('id', $order->cart_id)->forceDelete();
        return back();
    }
}
