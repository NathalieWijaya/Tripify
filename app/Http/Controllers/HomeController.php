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
            ->select('tours.province_id', DB::raw('SUM(quantity) as count'))
            ->join('tours', 'transaction_details.tour_id', '=', 'tours.id')
            ->join('transactions', 'transaction_details.transaction_id', '=', 'transactions.id')
            ->where('transactions.status', 'Paid')
            ->where('tours.is_public', '1')
            ->groupBy('tours.province_id')
            ->orderBy('count','desc')
            ->get();

        $prov = Province::all();
        $province = array();
        $count = 0;
        foreach($popular as $p){
            foreach($prov as $pro){
                if ($p->province_id == $pro->id){
                    $province[] = $pro;
                    $count++;
                    if ($count == 3)
                        break;
                }
            }
            if ($count == 3)
                break;
        }
    
        if(count($province) < 3){
            $remainingProv = $prov->diff($province);
            foreach($remainingProv as $provinceAdd) {
                if(count($province) < 3){
                    array_push($province, $provinceAdd);
                }
            }
        }
        return view('home', compact('tour', 'popular', 'province'));
    }
}
