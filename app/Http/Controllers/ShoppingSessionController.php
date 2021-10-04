<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingSessionController extends Controller
{
    public function storeShipping(Request $request)
    {
        $request->session()->put('shipping', $request->input('shipping'));
        return redirect('/address');
    }

    public function storeAddress(Request $request)
    {
        $request->session()->put('address', $request->input('address'));
        return view('payment');
    }
}
