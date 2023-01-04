<?php

namespace App\Http\Controllers;

use App\Models\RequestTrip;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InboxController extends Controller
{

    public function toInbox($id){

        // if(Auth::user()->is_admin == true){
        //     $inbox = RequestTrip::all()->sortByDesc('request_date');
        // }
        // else {
        //     $inbox = RequestTrip::where('user_id', $id)->get();
        // }
        $inbox = RequestTrip::all()->sortByDesc('request_date');
        $status = Status::all();

        $email = null;
        $selectedStatus = null;
        $selectedSend = null;
        
        return view('inbox', compact('status', 'inbox', 'email', 'selectedStatus', 'selectedSend'));
    }

    public function filter(Request $request){
        $email = $request->email;
        $selectedStatus = $request->status;
        $selectedSend = $request->send;

        $inbox = RequestTrip::select()
            ->join('users', 'user_id', '=', 'users.id')
            ->where('email', 'like', "%$email%")
            ->orderBy('request_date', $selectedSend)
            ->get();

        // if(Auth::user()->is_admin == false){
        //     $inbox = $inbox->where('user_id', Auth::user()->id);
        // }

        if($selectedStatus != "all"){
            $inbox = $inbox->where('status_id', $selectedStatus);
        }
        
        $status = Status::all();
        return view('inbox', compact('status', 'inbox', 'email', 'selectedStatus', 'selectedSend'));
    }

}
