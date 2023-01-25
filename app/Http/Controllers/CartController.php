<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Tour;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Midtrans\Config;
use Midtrans\Snap;
use stdClass;

class CartController extends Controller
{
    public function index($id){
        $cart = Cart::where('user_id', $id)->get();
        $stock = null;
        foreach($cart as $c){
            $sold = Transaction::where('status', 'Paid')
            ->join('transaction_details', 'transactions.id', 'transaction_details.transaction_id')
            ->where('transaction_details.tour_id', $c->tour_id)
            ->sum('transaction_details.quantity');

            $tour = Tour::find($c->tour_id);

            $stock[] = $tour->max_slot - $sold;
        }
        return view('cart', compact('cart', 'stock'));
    }

    public function store($tourid, $qty){
        DB::table('carts')->insert([
            'user_id' => Auth::user()->id,
            'tour_id' => $tourid,
            'quantity' => $qty
        ]);
    }

    public function update($id, $qty){
        Cart::find($id)->update('quantity', $qty);
    }
    
    public function getCheckedCart(Request $request) {
        $grossAmount = 0;
        
            foreach($request->checkbox as $c){
            
                $id = $request->id;
                $tourId = '';
    
                for($i = 0; $i < count($id); $i++){
                    if($c == $id[$i]){
                        $cart = Cart::find($c);
                        $tourId = $cart->tour_id;
    
                        $tour = Tour::find($tourId);
                        $price = $tour->price;
    
                        $qty = $request->qty[$i];
                        $grossAmount += ($price * $qty);
    
                        $item = new stdClass();
                        $item->id = $tourId;
                        $item->price = $price;
                        $item->quantity = $qty;
                        $item->name = $tour->tour_title;
                        $item->merchant_name = "Tripify";
                       
                        $itemDetails[] = $item;
    
                        $cart->qtyBuy = $qty;
                        $carts[] = $cart;
                    } 
                }
            }
    
            $trans = Transaction::create([
                'user_id' => Auth::user()->id,
                'total_price' => $grossAmount,
                'status' => 'Unpaid'
            ]);
           
    
            foreach($itemDetails as $i){
                DB::table('transaction_details')->insert([
                    'transaction_id' => $trans->id,
                    'tour_id' => $i->id,
                    'quantity' => $i->quantity
                ]);
                
            }
    
            Config::$serverKey = config('midtrans.server_key');
            Config::$isProduction = false;
            Config::$isSanitized = true;
            Config::$is3ds = true;
            
            $params = array(
                'transaction_details' => array(
                    'order_id' => $trans->id,
                    'gross_amount' => $grossAmount
                ),
    
                'item_details' => json_decode(json_encode($itemDetails), true),
                
                'customer_details' => array(
                    'first_name' => $trans->user->name,
                    'email' => $trans->user->email,
                    'phone' => $trans->user->phone
                ),
            );
            
            $snapToken = Snap::getSnapToken($params);
    
            return view('purchase', compact('snapToken', 'params', 'carts'));
        
        
    }

    public function destroy($id){
        DB::table('carts')->where('tour_id', $id)->where('user_id', Auth::user()->id)->delete();
    }

}
