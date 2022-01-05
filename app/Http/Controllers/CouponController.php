<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function addCoupon(Request $request)
    {
        $coupon=Coupon::where('code',$request->code)->first();
        if(empty($coupon))
        {
            $request->session()->flash('errorcoupon', 'Invalid coupon!');
            return back();
        }
        else
        {
            $request->session()->put('coupon', $coupon->percent);
            $request->session()->flash('successcoupon', 'Coupon applied!');
            return back();
        }
    }

    public function cancelCoupon(Request $request)
    {
        $request->session()->forget('coupon');
        $request->session()->flash('cancel', 'Coupon canceled!');
        return back();
    }

    public function store(Request $request){
        $validated = $request->validate([
            'code' => 'required|max:255',
            'percent' => 'required|numeric|max:100',
        ]);
        Coupon::create($validated);
        $request->session()->flash('success', 'Coupon \''.$validated['code'].'\' successfully added!');
        return back();
    }
}
