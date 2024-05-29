<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
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

    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId);

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->price,
            'weight' => 0,
            'options' => [
                'image' => $product->image,
            ]
        ]);

        return redirect()->back()->with('success', 'Product added to cart successfully');
    }

    public function qtyIncrement($id)
    {
        $product = Cart::get($id);
        $updateQty = $product->qty + 1;

        Cart::update($id, $updateQty);

        return redirect()->back()->with('success', 'Product increased successfully');
    }

    public function qtyDecrement($id)
    {
        $product = Cart::get($id);
        $updateQty = $product->qty - 1;

        if($updateQty > 0) {
            Cart::update($id, $updateQty);
        }

        return redirect()->back()->with('success', 'Product decreased successfully');
    }

    public function removeProduct($id)
    {

        Cart::remove($id);

        return redirect()->back()->with('success', 'Product removed successfully');
    }
}
