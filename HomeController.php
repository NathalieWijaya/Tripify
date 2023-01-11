<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $placeData = Place::all();
        return view('home', compact('placeData'));
    }
}
