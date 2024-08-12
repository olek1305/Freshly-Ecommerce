<?php

use Gloudemans\Shoppingcart\Facades\Cart;

/** Set Sidebar item active */

function setActive(array $route): bool|string
{
    if (is_array($route)) {
        foreach ($route as $r) {
            if(request()->routeIs($r)) {
                return 'active';
            }
        }
    }
    return false;
}

/** Check if product have discount */
function checkDiscount($product): bool
{
    $currentDate = date('Y-m-d');

    if($product->offer_price > 0 && $currentDate >= $product->offer_start_date && $currentDate <= $product->offer_end_date) {
        return true;
    }

    return false;
}

/** Calculate discount percent */
function calculateDiscountPercent($originalPrice, $discountPrice): float
{
    $discountAmount = $originalPrice - $discountPrice;
    $discountPercent = ($discountAmount / $originalPrice) * 100;

    return round($discountPercent);
}

/** check the product type */
function productType(string $type): string
{
    return match ($type) {
        'new_arrival' => 'New',
        'featured_product' => 'Featured',
        'top_product' => 'Top',
        'best_product' => 'Best',
        default => '',
    };
}

/** get total cart amount */
function getCartTotal(): int|float
{
    $total = 0;
    foreach (Cart::content() as $product) {
        $total += ($product->price + $product->options->variants_total) * $product->qty;
    }

    return $total;
}

/** get payable total amount */
function getMainCartTotal(): float
{
    $subTotal = getCartTotal();

    if (Session::has('coupon')) {
        $coupon = Session::get('coupon');
        if ($coupon['discount_type'] === 'amount') {
            return round($subTotal - $coupon['discount'], 2);
        } elseif ($coupon['discount_type'] === 'percent') {
            $discount = $subTotal * $coupon['discount'] / 100;
            return round($subTotal - $discount, 2);
        }
    }

    return round($subTotal, 2);
}

/** get cart discount */
function getCartDiscount(): float
{
    if (Session::has('coupon')) {
        $coupon = Session::get('coupon');
        $subTotal = getCartTotal();
        if ($coupon['discount_type'] === 'amount') {
            return round($coupon['discount'], 2);
        } elseif ($coupon['discount_type'] === 'percent') {
            return round($subTotal * $coupon['discount'] / 100, 2);
        }
    }

    return 0.00;
}

/** get selected shipping fee from session */
function getShippingFee(): float
{
    if (Session::has('shipping_method')) {
        return Session::get('shipping_method')['cost'];
    } else {
        return 0;
    }
}

/** get payable amount */
function getFinalPayableAmount(): float
{
    return  getMainCartTotal() + getShippingFee();
}




