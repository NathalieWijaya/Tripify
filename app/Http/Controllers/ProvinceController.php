<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\TourPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProvinceController extends Controller
{
    public function showProvince(){
        $provinces = Province::all();

        return view('addTour', compact('provinces'));
    }
    public function showProvinces(){
        $provinces = Province::all();

        return view('addProvince', compact('provinces'));
    }

    public function store(Request $request){
        $rules = [
            'prov' => 'required|unique:provinces,province_name'
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return back()->withErrors($validator);
        } 

        DB::table('provinces')->insert([
            "province_name" =>  $request->prov
        ]);
        return redirect('/');
    }
}
