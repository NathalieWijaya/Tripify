<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use \Midtrans\Config;
use Midtrans\Snap;

class TransactionController extends Controller
{
    public function index(){
        return view('purchase');
    }

    public function purchase(Request $request) {
        $request->request->add(
            [
                'user_id' => 2,
                'total_price' => 850000,
                'status' => 'Unpaid'
            ]
        );
        
        $trans = Transaction::create([
            'user_id' => $request->user_id,
            'total_price' => $request->total_price,
            'status' => 'Unpaid'
        ]);
        
        //ini masukin data dulu ke tabel transaction

        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;
        
        $params = array(
            'transaction_details' => array(
                'order_id' => $trans->id 
                // 'gross_amount' => 100000
            ),

            "item_details" => array([
                "id" => "ITEM1",
                "price" => 850000,
                "quantity"=> 1,
                "name" => "Jakarta Day Trip",
                "brand" => "Midtrans",
                "category" => "Toys",
                "merchant_name" => "Midtrans"
            ]),
                
            'customer_details' => array(
                'first_name' => $trans->user->name,
                'email' => $trans->user->email,
                'phone' => $trans->user->phone
            ),
        );
        
        $snapToken = Snap::getSnapToken($params);
        return view('purchase', compact('snapToken', 'params'));
    }

    public function callback(Request $request){
        $server_key = config('midtrans.server_key');
       
        $sign_key = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $server_key);

        if ($sign_key == $request->signature_key){
            
            if($request->transaction_status == "capture"){
                $trans = Transaction::find($request->order_id);
                $trans->update(['status' => 'Paid']);
            }
        }
    }
}
