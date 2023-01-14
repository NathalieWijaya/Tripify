<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index($id){
        $cart = Cart::where('user_id', $id)->get();
        return view('cart', compact('cart'));
    }
    public function destroy($id){
        DB::table('carts')->where('tour_id', $id)->delete();
    }
}
