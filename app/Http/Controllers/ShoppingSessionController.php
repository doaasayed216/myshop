<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingSessionController extends Controller
{
    public function storeShipping(Request $request)
    {
        $request->validate(['shipping' => 'required|numeric']);
        $request->session()->put('shipping', $request->input('shipping'));
        return redirect('/addresses/create');
    }

    public function storeAddress(Request $request)
    {
        $request->validate(['address' => 'required|numeric|exists:addresses,id']);
        $request->session()->put('address', $request->input('address'));
        return redirect('/payment/create');
    }
}
