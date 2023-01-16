<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

                $trans = Transaction::find($request->order_id);
                foreach($trans->transactionDetail as $d){
                    Cart::where('tour_id', $d->tour_id)->where('user_id', $trans->user_id)->delete();
                }
            }
        }
    }
}
