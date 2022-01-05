<?php

namespace App\Http\Controllers;
use Cart;
use App\Models\Product;

use Illuminate\Http\Request;

class OtherCartInstanceController extends Controller
{
    public function addToWishlist(Request $request,$id)
    {
        $product=Product::find($id);
        Cart::instance('wishlist')->add($id, $product->title, 1,$product->price, ['id'=>$product->id,'image' => $product->image,'slug'=>$product->slug]);
        $request->session()->flash('success', 'The product has been added to the wishlist!');
        return back();
    }

    public function addToCompare(Request $request,$id)
    {
        $product=Product::find($id);
        Cart::instance('compare')->add($id, $product->title, 1,$product->price, ['description'=>$product->description,'rating'=>$product->rating,'id'=>$product->id,'image' => $product->image,'slug'=>$product->slug]);
        $request->session()->flash('success', 'The product has been added to the compareList!');
        return back();
    }
}
