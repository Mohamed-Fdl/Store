<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Cart;
use App\Models\Product;
use Gloudemans\Shoppingcart\Cart as ShoppingcartCart;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function store(Request $request)
    {
        if ($request->index) {
            dd($request->index);
        } else {
            $product = Product::find($request->id);
            Cart::add($request->id, $product->title, $request->qty, $product->price, ['image' => $product->image, 'slug' => $product->slug])->associate('Product');
            $request->session()->flash('success', 'The product has been added to cart!');
            return back();
        }
    }

    public function show()
    {
        return view('cart.index');
    }

    public function update(Request $request, $id)
    {
        $data = $request->json()->all();
        $validate = Validator::make($request->all(), [
            'qty' => 'required|numeric|between:1,10'
        ]);
        if ($validate->fails()) {
            $request->session()->flash('error', 'The quantity of the product cannot exceed 10');
            return response()->json(['error' => 'Invalid quantity']);
        }
        Cart::update($id, $data['qty']);
        $request->session()->flash('success', 'The quantity of the product is updates to ' . $data['qty'] . '.');
        return response()->json(['success' => 'Cart updated successfully']);

        // dd($request->id,$request->qty);
        // foreach($request->qty as $k=>$q)
        // {
        //     Cart::update($k,$q);
        // }
        // $request->session()->flash('success', 'Le panier a bien ete mis a jour!');
        // return back();
    }

    public function addOneInCart(Request $request, $id)
    {
        $product = Product::find($id);
        Cart::add($id, $product->title, 1, $product->price, ['image' => $product->image, 'slug' => $product->slug])->associate('Product');
        $request->session()->flash('success', 'The product has been added to cart!');
        return back();
    }

    public function addCart(Request $request, $id)
    {
        $product = Product::find($id);
        foreach ($request->qty as $k => $qty) {
            Cart::add($id, $product->title, $qty, $product->price, ['image' => $product->image, 'slug' => $product->slug])->associate('Product');
            Cart::instance('wishlist')->remove($k);
            $request->session()->flash('success', 'The product has been added to cart!');
            return back();
        }
    }

    public function finish()
    {
        $extract = [];
        foreach (Cart::instance('default')->content() as $p) {
            $extract[$p->id] = $p->qty;
        }
        $payment['user_id'] = Auth::user()->id;
        $payment['shipping'] = json_encode($extract);
        Payment::create($payment);
        Cart::instance('default')->destroy();
        return view('checkout.thanks');
    }
}
