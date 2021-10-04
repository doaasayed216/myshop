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
        $attributes = $request->validate([
            'phone' => 'required',
            'details' => 'required',
            'city' => 'required',
            'postcode' => 'required'
        ]);

        $attributes['user_id'] = auth()->user()->id;

        $address = Address::create($attributes);

        $request->session()->put('address', $address->id);

        return redirect('/payment');

    }

    public function edit(Address $address)
    {
        return view('address-edit' , ['address' => $address]);
    }

    public function update(Address $address)
    {
        $attrubutes = request()->validate([
            'phone' => 'required',
            'details' => 'required',
            'city' => 'required',
            'postcode' => 'required'
        ]);

        $address->update($attrubutes);
        return redirect('/address');
    }

    public function destroy(Address $address)
    {
        $address->delete();
        return back();
    }
}
