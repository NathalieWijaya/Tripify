<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        return view('purchase');
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
