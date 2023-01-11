<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\TourPlace;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function showProvince(){
        $provinces = Province::all();

        return view('addTour', compact('provinces'));
    }
}
