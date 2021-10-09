<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function create()
    {
        return view('address');
    }

    public function store(Request $request)
    {
        $attributes = array_merge($this->validateAddress($request),[
            'user_id' => auth()->user()->id
        ]);

        $address = Address::create($attributes);
        $request->session()->put('address', $address->id);
        return redirect('/payment/create');
    }

    public function edit(Address $address)
    {
        return view('address-edit' , ['address' => $address]);
    }

    public function update(Request $request, Address $address)
    {
        $address->update($this->validateAddress($request));
        return redirect('/addresses/create');
    }

    public function destroy(Address $address)
    {
        $address->delete();
        return back();
    }

    protected function validateAddress(Request $request)
    {
        return $request->validate([
            'phone' => ['required', 'regex:/(01)[0-9]{9}/', 'size:11'],
            'details' => ['required'],
            'city' => ['required', 'string'],
            'postcode' => ['required', 'numeric']
        ]);
    }
}
