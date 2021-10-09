<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use LVR\CreditCard\CardCvc;
use LVR\CreditCard\CardNumber;
use LVR\CreditCard\CardExpirationYear;
use LVR\CreditCard\CardExpirationMonth;

class PaymentController extends Controller
{
    public function create()
    {
        return view('payment');
    }

    public function store(Request $request)
    {
        if($request->cash) {
            $request->session()->put('cash', true);
        }

        elseif ($request->existing_card) {
            if($request->session()->has('cash')) {
                $request->session()->forget('cash');
            }
            $payment_id = Payment::where('user_id', $request->user()->id)->get('id');
            $request->session()->put('existing_card', $payment_id);
        }

        else{
            if($request->session()->has('cash')) {
                $request->session()->forget('cash');
            }

            if($request->session()->has('existing_card')) {
                $request->session()->forget('existing_card');
            }

            $attributes = $request->validate([
                'user_id' => ['required', Rule::unique('payments', 'user_id')],
                'card_number' => ['required', Rule::unique('payments', 'card_number'), new CardNumber],
                'expiration_year' => ['required', new CardExpirationYear($request->get('expiration_month'))],
                'expiration_month' => ['required', new CardExpirationMonth($request->get('expiration_year'))],
                'cvc' => ['required', new CardCvc($request->get('card_number'))]
            ]);

            Payment::create($attributes);
        }

        return redirect('/order/create');

    }
}
