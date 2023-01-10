<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Place;
use App\Models\Province;
use App\Models\Tour;
use App\Models\TourCategory;
use App\Models\TourPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use stdClass;

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
        $current_tour = new stdClass();
        $current_tour->tour_title = null;
        $current_tour->province_id = null;
        $current_tour->description = null;
        $current_tour->start_date = null;
        $current_tour->end_date = null;
        $current_tour->include = null;
        $current_tour->not_include = null;
        $current_tour->itinerary = null;
        $current_tour->max_slot = null;
        $current_tour->price = null;
        $current_tour->highlights = null;
        $current_tour_place = null;
        $current_tour_category = new stdClass();
        $province = Province::all();
        $category = Category::all();
 
        //  return view('addTour', compact('province','category'));
        return view('addTour', compact('current_tour', 'current_tour_place', 'current_tour_category','province','category'));
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $current_tour = Tour::find($id);
        $current_tour_place = TourPlace::all()->where('tour_id', '=', $id);
        $current_tour_category = TourCategory::all()->where('tour_id', '=', $id);
        $province = Province::all();
        $category = Category::all();


        return view('addTour', compact('current_tour', 'current_tour_place', 'current_tour_category','province','category'));
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

        DB::table('tours')->where('id', $id)->update([
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

        DB::table('tour_categories')->where('tour_id', $id)->delete();
        foreach ($request->category as $categoryid) {
            DB::table('tour_categories')->insert([
                'tour_id' => $id,
                'category_id' => $categoryid
            ]);
        }
        


        return redirect('/');

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
