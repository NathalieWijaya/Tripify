<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentHistoryController extends Controller
{
    public function index(){
        if(Auth::user()->is_admin == true) {
            $history = Transaction::where('status', 'Paid')
            ->orderBy('transaction_time', 'desc')
            ->paginate(10);
        } 
        else {
            $history = Transaction::where('user_id', Auth::user()->id)
                ->where('status', 'Paid')
                ->orderBy('transaction_time', 'desc')
                ->paginate(10);
        }
        return view('paymentHistory', compact('history'));
    }
}
