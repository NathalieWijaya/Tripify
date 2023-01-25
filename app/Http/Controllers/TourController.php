<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Tour;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Place;
use App\Models\Province;
use App\Models\TourCategory;
use App\Models\TourPlace;
use Illuminate\Support\Facades\Validator;
use Midtrans\Config;
use Midtrans\Snap;
use stdClass;

class TourController extends Controller
{
    public function index()
    {
        $tour = Tour::all();
        $province = Province::all();
        $category = Category::all();
        $selectedProv = "all";
        $selectedProvince = null;
        $selectedCategory = null;
        $selectedCat = 'all';
        $disabled = null;
        $selectedSort = null;
        $tourPlaces = Tour::join('tour_places', 'tours.id', '=', 'tour_places.tour_id')->get();
        return view('tour', compact('tour', 'province', 'category', 'selectedProv', 'selectedCat','selectedProvince','disabled','selectedCategory','selectedSort', 'tourPlaces'));
    }

    public function filter(Request $request)
    {
        $selectedProvince = $request->province;
        $selectedCategory = $request->category;
        $disabled = null;
        $province = Province::all();
        $category = Category::all();
        $tour = Tour::all();
        $selectedSort = $request->sort;
        $tourPlaces = null;


        if($selectedProvince != "all" and $selectedCategory != "all"){
            $tour = Tour::join('tour_categories', 'tours.id', '=', 'tour_categories.tour_id')->where('category_id', '=', $selectedCategory)->where('province_id', '=', $selectedProvince)->get();
            $tourPlaces = Tour::join('tour_places', 'tours.id', '=', 'tour_places.tour_id')->join('places', 'places.id', '=', 'tour_places.place_id')->where('tours.province_id','=',$selectedProvince)->get();
        }

        else if($selectedProvince != 'all'){
            $tour = Tour::where('province_id','=' , $selectedProvince)->get();
        }

        else if($selectedCategory != 'all'){
            $tour = Tour::join('tour_categories', 'tours.id', '=', 'tour_categories.tour_id')->where('category_id', '=', $selectedCategory)->get();
            $tourPlaces = Tour::join('tour_places', 'tours.id', '=', 'tour_places.tour_id')->join('places', 'places.id', '=', 'tour_places.place_id')->get();
        }

        


        if ($selectedSort == "asc") {
            $tour = $tour->sortBy('tour_title');
        } else if ($selectedSort == "desc") {
            $tour = $tour->sortByDesc('tour_title');
        } else if ($selectedSort == "min") {
            $tour = $tour->sortBy('price');
        } else if ($selectedSort == "max") {
            $tour = $tour->sortByDesc('price');
        }
        
        return view('tour', compact('tour','selectedProvince','selectedCategory', 'disabled', 'province', 'category', 'selectedSort', 'tourPlaces'));
    }

    public function sort($sort)
    {
        $tour = Tour::all();
        if ($sort == "asc") {
            $tour = $tour->sortBy('tour_title');
        } else if ($sort == "desc") {
            $tour = $tour->sortByDesc('tour_title');
        } else if ($sort == "min") {
            $tour = $tour->sortBy('price');
        } else if ($sort == "max") {
            $tour = $tour->sortByDesc('price');
        }
        dd($sort);
    }

    public function purchase(Request $request)
    {
        $grossAmount = 0;

        $id = $request->id;
        $tour = Tour::find($id);
        $price = $tour->price;
        $qty = $request->qty;

        $grossAmount = ($price * $qty);

        $item = new stdClass();
        $item->id = $id;
        $item->price = $price;
        $item->quantity = $qty;
        $item->name = $tour->tour_title;
        $item->merchant_name = "Tripify";

        $itemDetails[] = $item;

        $cart = new Cart();
        $cart->qtyBuy = $qty;
        $cart->tour_id = $id;
        $cart->quantity = 0;
        $cart->user_id = Auth::user()->id;
        $carts[] = $cart;

        $trans = Transaction::create([
            'user_id' => Auth::user()->id,
            'total_price' => $grossAmount,
            'status' => 'Unpaid'
        ]);


        foreach ($itemDetails as $i) {
            DB::table('transaction_details')->insert([
                'transaction_id' => $trans->id,
                'tour_id' => $i->id,
                'quantity' => $i->quantity
            ]);
        }

        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $trans->id,
                'gross_amount' => $grossAmount
            ),

            'item_details' => json_decode(json_encode($itemDetails), true),

            'customer_details' => array(
                'first_name' => $trans->user->name,
                'email' => $trans->user->email,
                'phone' => $trans->user->phone
            ),
        );

        $snapToken = Snap::getSnapToken($params);

        return view('purchase', compact('snapToken', 'params', 'carts'));
    }

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

        return view('addTour', compact('current_tour', 'current_tour_place', 'current_tour_category', 'province', 'category'));
    }

    public function showPlace($id)
    {
        $place = Place::where('province_id', $id)->get();

        return response()->json($place);
    }

    public function store(Request $request)
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

        if ($validator->fails()) {
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
            'not_include' => $request->not_include,
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

    public function show($id)
    {
        $tour = Tour::find($id);
        $sold = Transaction::where('status', 'Paid')
            ->join('transaction_details', 'transactions.id', 'transaction_details.transaction_id')
            ->where('transaction_details.tour_id', $id)
            ->sum('transaction_details.quantity');

        $cart = 0;

        if (Auth::user()) {
            $cart = Cart::where('user_id', Auth::user()->id)->where('tour_id', $id)->count();
        }

        if ($cart > 0)
            $disabled = "disabled";
        else
            $disabled = "";

        $stock = $tour->max_slot - $sold;
        return view('tourdetail', compact('tour', 'stock', 'disabled'));
    }

    public function edit($id)
    {
        $current_tour = Tour::find($id);
        $current_tour_place = TourPlace::all()->where('tour_id', '=', $id);
        $current_tour_category = TourCategory::all()->where('tour_id', '=', $id);
        $province = Province::all();
        $category = Category::all();

        return view('addTour', compact('current_tour', 'current_tour_place', 'current_tour_category', 'province', 'category'));
    }

    public function update(Request $request, $id)
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

        if ($validator->fails()) {
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
            'not_include' => $request->not_include,
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
        DB::table('tour_places')->where('tour_id', $id)->delete();
        foreach ($request->place as $placeid) {
            DB::table('tour_places')->insert([
                'tour_id' => $id,
                'place_id' => $placeid
            ]);
        }
        return redirect('/');
    }
    public function destroy($id){
        DB::table('tours')->where('id', $id)->delete();
        return redirect('/tour');
    }
}