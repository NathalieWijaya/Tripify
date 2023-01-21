<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showProvince(Request $request)
    {
        $province = Province::all();

        return view('addDestination', compact('province'));
    }
    public function store(Request $request)
    {
        $rules = [
            'place_name' => 'required|unique:places,place_name',
            'place_image' => 'required',
            'province_id' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $place_image = [];
        foreach ($request->file('place_image') as $key => $image) {
            $images = $image->hashName();
            Storage::putFileAs('public/images', $image,$images);
            
            if ($images){
                array_push($place_image, $images);
            }
        }


        $i = 0;
        foreach ($request->place_name as $place) {
            DB::table('places')->insert([
                'province_id' => $request->province_id,
                'place_name' => $place,
                'place_image' => $place_image[$i]
            ]);
            $i++;
        }
        return redirect('/');

    }
}
