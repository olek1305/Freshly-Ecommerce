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
