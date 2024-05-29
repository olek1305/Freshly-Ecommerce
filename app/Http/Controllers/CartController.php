<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function shop()
    {
        $products = Product::all();
        return view('cart.shop', compact('products'));
    }

    public function cart()
    {
        return view('cart.cart');
    }
}
