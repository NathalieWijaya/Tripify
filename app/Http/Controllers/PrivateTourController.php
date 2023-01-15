<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use stdClass;

class PrivateTourController extends Controller
{
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


     public function store(Request $request, $id)
     {
         $rules = [
             'title' => 'required|min:5',
             'province' => 'required',
             'place' => 'required',
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
             'price' => $request->price,
             'is_public' => false
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

        DB::table('carts')->insert([
            'user_id' => $id,
            'tour_id' => $tour_id,
            'quantity' => '2'
        ]);
 
 
         return redirect('/');
     }
}
