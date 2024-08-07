<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    public function couponApply(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string'
        ]);

        if ($request->coupon_code === null) {
            return response(['status' => 'error', 'message' => 'Coupon filed is required']);
        }

        $coupon = Coupon::where(['code' => $request->coupon_code, 'status' => 1])->first();

        if ($coupon === null) {
            return response(['status' => 'error', 'message' => 'Coupon not exist!']);
        } elseif ($coupon->start_date > date('Y-m-d')){
            return response(['status' => 'error', 'message' => 'Coupon not exist!']);
        } elseif ($coupon->end_date < date('Y-m-d')){
            return response(['status' => 'error', 'message' => 'Coupon is expired']);
        } elseif ($coupon->total_used >= $coupon->quantity){
            return response(['status' => 'error', 'message' => 'you can not apply this coupon']);
        }

        if ($coupon->discount_type === 'amount') {
            Session::put('coupon', [
                'coupon_name' => $coupon->name,
                'coupon_code' => $coupon->code,
                'discount_type' => 'amount',
                'discount' => $coupon->discount
            ]);
        } elseif ($coupon->discount_type === 'percent') {
            Session::put('coupon', [
                'coupon_name' => $coupon->name,
                'coupon_code' => $coupon->code,
                'discount_type' => 'percent',
                'discount' => $coupon->discount
            ]);
        }
        return response(['status' => 'success', 'message' => 'Coupon applied successfully']);
    }

    /** Calculate coupon discount */
    public function couponCalculation()
    {
        $subTotal = getCartTotal();

        if (Session::has('coupon')) {
            $coupon = Session::get('coupon');
            if ($coupon['discount_type'] === 'amount') {
                $total = $subTotal - $coupon['discount'];
                $total = round($total, 2);
                return response(['status' => 'success', 'cart_total' => $total, 'discount' => round($coupon['discount'], 2)]);
            } elseif ($coupon['discount_type'] === 'percent') {
                $discount = $subTotal * $coupon['discount'] / 100;
                $total = $subTotal - $discount;
                $total = round($total, 2);
                return response(['status' => 'success', 'cart_total' => $total, 'discount' => round($discount, 2)]);
            }
        }

        $total = round($subTotal, 2);
        return response(['status' => 'success', 'cart_total' => $total, 'discount' => 0.00]);
    }
}
