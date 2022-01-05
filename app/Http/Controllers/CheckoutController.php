<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|numeric',
            'shipping' => 'required|json',
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'country' => 'required',
            'adress' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postal_code' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        Payment::create($validated);
        Cart::instance('default')->destroy();
        return view('checkout.thanks');
    }

    public function show()
    {
        $pays=Payment::where('user_id',Auth::user()->id)->get();
        return view('dashboard',compact('pays'));
    }
}
