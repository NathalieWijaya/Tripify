<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\RequestTrip;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InboxController extends Controller
{

    public function toInbox($id){

        if(Auth::user()->is_admin == true){
            $inbox = RequestTrip::all()->sortByDesc('request_date');
        }
        else {
            $inbox = RequestTrip::where('user_id', $id);
        }
        $status = Status::all();
        $province = Province::all();

        $email = null;
        $selectedStatus = null;
        $selectedSend = null;
        $selectedDestination = null;
        $disabled = "";
        $temp = $inbox->get();
        if(count($temp) == 0){
            $disabled = "disabled";
        }

        $inbox = $inbox->paginate(10);

        return view('inbox', compact('status', 'province', 'inbox', 'email', 'selectedStatus', 'selectedSend', 'selectedDestination', 'disabled'));
    }

    public function filter(Request $request){
        if($request->has('inboxId')){
            DB::table('request_trips')->where('id', $request->inboxId)->update([
                "note" =>  $request->note,
                "approval_time" => \Carbon\Carbon::now(),
                "status_id" => $request->statusUp
            ]);
            return $this->toInbox(Auth::user()->id);

        } else {
            $email = $request->email;
            $selectedStatus = $request->status;
            $selectedSend = $request->send;
            $selectedDestination = $request->destination;
            $disabled = "";

            $inbox = RequestTrip::select()
                ->join('users', 'user_id', '=', 'users.id')
                ->where('email', 'like', "%$email%")
                ->orderBy('request_date', $selectedSend);
    
            if(Auth::user()->is_admin == false){
                $inbox = $inbox->where('user_id', Auth::user()->id);
    
                if($selectedDestination != 'all'){
                    $inbox = $inbox->where('province_id', $selectedDestination);
                }
            }
    
            if($selectedStatus != "all"){
                $inbox = $inbox->where('status_id', $selectedStatus);
            }
            
            $status = Status::all();
            $province = Province::all();
            $inbox = $inbox->paginate(10);
            return view('inbox', compact('status', 'province', 'inbox', 'email', 'selectedStatus', 'selectedSend', 'selectedDestination', 'disabled'));
        }
      
    }
}
