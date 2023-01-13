<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Tour;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $tour = Tour::all()->shuffle()->take(4);

        $popular = DB::table('transaction_details')
            ->select('tours.province_id', DB::raw('COUNT(tours.province_id) as count'))
            ->join('tours', 'transaction_details.tour_id', '=', 'tours.id')
            ->join('transactions', 'transaction_details.transaction_id', '=', 'transactions.id')
            ->where('transactions.status', 'Paid')
            ->groupBy('tours.province_id')
            ->orderBy('count', 'desc')
            ->get();

        $province = Province::all();

        return view('home', compact('tour', 'popular', 'province'));
    }
}
