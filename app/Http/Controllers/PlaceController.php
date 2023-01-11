<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function showPlace(){
        $places = Place::whereHas('province', function ($query) {
            $query->whereId(request()->input('province_id', 0));
        })->pluck('place_name', 'id');
        return response()->json($places);
    }
}
