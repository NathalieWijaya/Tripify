<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Province;
use App\Models\Tour;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Midtrans\Config;
use Midtrans\Snap;
use stdClass;

class CartController extends Controller
{
    public function index($id){
        $cart = Cart::where('user_id', $id)->get();
        return view('cart', compact('cart'));
    }
    
    public function getCheckedCart(Request $request) {

        //dd($request->all());
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
                    $item->province_name = Province::find($tour->province_id);

                    $itemDetails[] = $item;

                    $carts[] = $cart;
                } 
            }
        }

        // $this->purchase($grossAmount, $itemDetails);
        $trans = Transaction::create([
            'user_id' => '2',
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

            "item_details" => json_decode(json_encode($itemDetails), true),
                
            'customer_details' => array(
                'first_name' => $trans->user->name,
                'email' => $trans->user->email,
                'phone' => $trans->user->phone
            ),
        );
        
        $snapToken = Snap::getSnapToken($params);

        return view('purchase', compact('snapToken', 'params', 'carts'));
    }

    


}
