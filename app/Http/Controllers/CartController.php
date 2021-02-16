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
        }else {
            $cart = null;
        }
        //dd($cart->items);
        return Inertia::render('FrontEnd/cart', ['cart' => $cart]);
    }
}
