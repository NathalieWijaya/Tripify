<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Tour;
use Illuminate\Support\Facades\DB;
use stdClass;

class HomeController extends Controller
{
    public function index()
    {
        $tour = Tour::all()->where('is_public', '1')->shuffle()->take(4);
    
        $popular = DB::table('transaction_details')
            ->select('tours.province_id', DB::raw('COUNT(tours.province_id) as count'))
            ->join('tours', 'transaction_details.tour_id', '=', 'tours.id')
            ->join('transactions', 'transaction_details.transaction_id', '=', 'transactions.id')
            ->where('transactions.status', 'Paid')
            ->where('tours.is_public', '1')
            ->groupBy('tours.province_id')
            ->orderBy('count', 'desc')
            ->get();

        $prov = Province::all();

        if(count($popular) < 3){
            $province = $prov->take(3);
        }
        else {
            foreach($popular as $p){
                foreach($prov as $pro){
                    if ($p->province_id == $pro->id){
                        $province[] = $pro;
                    }
                }
            }
        }
        return view('home', compact('tour', 'popular', 'province'));
    }
}
