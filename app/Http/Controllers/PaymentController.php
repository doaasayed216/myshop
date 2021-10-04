<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create()
    {
        return view('payment');
    }

    public function store(Request $request)
    {
        if($request->cash)
        {
            $request->session()->put('cash', true);
        }

        else{
            if($request->session()->has('cash'))
            {
                $request->session()->forget('cash');
            }

            $attributes = $request->validate([
                'card_number' => 'required',
                'expiration_date' => 'required',
                'security_code' => 'required'
            ]);

            $attributes['user_id'] = auth()->user()->id;
            Payment::create($attributes);
        }

        return redirect('/success');

    }
}
