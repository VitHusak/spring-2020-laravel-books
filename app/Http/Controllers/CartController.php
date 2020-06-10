<?php

namespace App\Http\Controllers;

use App\CartItem;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::all();

        return view('cart/index', compact('cartItems'));
    }
}
