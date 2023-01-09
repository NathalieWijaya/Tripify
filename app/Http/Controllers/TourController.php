<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Place;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TourController extends Controller
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

     public function showProvinceAndCategory(Request $request)
     {
        $province = Province::all();
        $category = Category::all();
 
         return view('addTour', compact('province','category'));
     }
 
     public function showPlace($id){
         $place = Place::where('province_id',$id)->get();
 
         return response()->json($place);
     }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|min:5',
            'province_id' => '',
            'place_id' => '',
            'price' => 'required|numeric',
            'start_date' => 'required',
            'end_date' => 'required|after_or_equal:start_date',
            'max_slot' => 'required|numeric',
            'description' => 'required|min:5',
            'include' => 'required|min:5',
            'itinerary' => 'required|min:5',
            'highlights' => 'required|min:5',
            'category' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        DB::table('tours')->insert([
            'tour_title' => $request->title,
            'province_id' => $request->province,
            'max_slot' => $request->max_slot,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
            'highlights' => $request->highlights,
            'include' => $request->include,
            'not_include'=> $request->not_include,
            'itinerary' => $request->itinerary,
            'price' => $request->price
        ]);

        $tour_id = DB::table('tours')->latest('id')->first()->id;
        foreach ($request->place as $placeid) {
            DB::table('tour_places')->insert([
                'tour_id' => $tour_id,
                'place_id' => $placeid
            ]);
        }

        foreach ($request->category as $categoryid) {
            DB::table('tour_categories')->insert([
                'tour_id' => $tour_id,
                'category_id' => $categoryid
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
        //
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
