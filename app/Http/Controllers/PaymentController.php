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
            session()->forget('payment');
            $request->session()->put('cash', true);
        }

        elseif($request->payment) {
            session()->forget('cash');
            session()->put('payment', $request->payment);
        }

        else {
            session()->forget(['cash', 'payment']);
            $attributes = $request->validate([
                'user_id' => ['required', Rule::exists('users', 'id')],
                'card_number' => ['required', Rule::unique('payments', 'card_number'), new CardNumber],
                'expiration_year' => ['required', new CardExpirationYear($request->get('expiration_month'))],
                'expiration_month' => ['required', new CardExpirationMonth($request->get('expiration_year'))],
                'cvc' => ['required', new CardCvc($request->get('card_number'))]
            ]);

            Payment::updateOrCreate(['user_id' => auth()->id()], $attributes);
        }

        return redirect('/order/create');

    }
}
