<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use App\Models\Cart;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Product $product){
        if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        }else{
            $cart = new Cart();
        }
        $cart->add($product);
        session()->put('cart', $cart);
        return redirect()->back()->with('message', $cart->totalQty);
    }

    public function showCart(){
        if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
            $cartItems = $cart->items;
            $cartPrice = $cart->totalPrice;
        }else {
            $cartPrice = null;
            $cartItems = null;
            $cart = null;
        }
        return Inertia::render('FrontEnd/cart', ['cart' => $cartItems, 'cartPrice' => $cartPrice]);
    }

    public function updateCart(Request $request, Product $product){
        $cart = new Cart(session()->get('cart'));
        $cart->updateQty($product->id,$request->qty);
        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function removeCart(Product $product){
        $cart = new Cart(session()->get('cart'));
        $cart->remove($product->id);
        if($cart->totalQty <= 0){
            session()->forget('cart');
        }else{
            session()->put('cart', $cart);
            return redirect()->back();
        }
        return redirect()->back();

    }
}
