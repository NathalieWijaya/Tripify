<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index($id){
        $cart = Cart::where('user_id', $id)->get();
        return view('cart', compact('cart'));
    }
}
