<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Province;
use App\Models\RequestPlace;
use App\Models\RequestTrip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use stdClass;

class ReqTripController extends Controller
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
                
        return view('requestTrip', compact('province'));
    }

    public function showPlace($id){
        $place = Place::where('province_id',$id)->get();

        return response()->json($place);
    }
    public function showProvinces(Request $request)
     {
        $trips = new stdClass();
        $trips->total_guest = null;
        $trips->max_price = null;
        $trips->start_date = null;
        $trips->end_date = null;
        $trips->trip_plan = null;
        $trips->province_id = null;
        $trips_place = null;
        $province = Province::all();
      

        //  return view('addTour', compact('province','category'));
        return view('requestTrip', compact('trips','province','trips_place'));
     }
    public function store(Request $request, $user_id)
    {
        $rules = [
            'total_guest' => 'required|numeric',
            'province_id' => '',
            'place_id' => '',
            'max_price' => 'required|numeric',
            'start_date' => 'required',
            'end_date' => 'required|after_or_equal:start_date'
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return back()->withErrors($validator);
        }
        //dd($request);

        DB::table('request_trips')->insert([
            'user_id' => $user_id,
            'province_id' => $request->province,
            'total_guest' => $request->total_guest,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'trip_plan' => $request->trip_plan,
            'max_price' => $request->max_price,
            'status_id' => '1',
            'request_date' => \Carbon\Carbon::now()
        ]);

        $request_id = DB::table('request_trips')->latest('id')->first()->id;

        foreach ($request->place as $placeid) {
            DB::table('request_places')->insert([
                'request_id' => $request_id,
                'place_id' => $placeid
            ]);
        }
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trips = RequestTrip::find($id);
        $trips_place = RequestPlace::all()->where('request_id', $id);
        $province = Province::all();

        return view('requestTrip', compact('trips','province','trips_place'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
