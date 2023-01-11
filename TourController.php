<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TourController extends Controller
{
    public function index() {
        $tourData = DB::table('tours')
        ->join('tour_places', 'tours.id', '=', 'tour_places.tour_id')
        ->join('places', 'tour_places.place_id', '=', 'places.id')->get();
        return view('tour', compact('tourData'));
    }

    public function filterBali(Request $request) {
        $destination = $request->query('destination');
        $tours = Tour::join('tour_places', 'tours.id', '=', 'tour_places.tours_id')
                ->join('places', 'tour_places.place_id', '=', 'places.id')
                ->join('provinces', 'places.province_id', '=', 'provinces.id')
                ->where('province_name', '=', 'Bali')
                ->get();
        return view('tour', compact('tourData'));
    }

    public function filterJakarta(Request $request) {
        $destination = $request->query('destination');
        $tours = Tour::join('tour_places', 'tours.id', '=', 'tour_places.tours_id')
                ->join('places', 'tour_places.place_id', '=', 'places.id')
                ->join('provinces', 'places.province_id', '=', 'provinces.id')
                ->where('province_name', '=', 'Jakarta')
                ->get();
        return view('tour', compact('tourData'));
    }

    public function filterYogyakarta(Request $request) {
        $destination = $request->query('destination');
        $tours = Tour::join('tour_places', 'tours.id', '=', 'tour_places.tours_id')
                ->join('places', 'tour_places.place_id', '=', 'places.id')
                ->join('provinces', 'places.province_id', '=', 'provinces.id')
                ->where('province_name', '=', 'Daerah Istimewa Yogyakarta')
                ->get();
        return view('tour', compact('tourData'));
    }

    public function filterNTT(Request $request) {
        $destination = $request->query('destination');
        $tours = Tour::join('tour_places', 'tours.id', '=', 'tour_places.tours_id')
                ->join('places', 'tour_places.place_id', '=', 'places.id')
                ->join('provinces', 'places.province_id', '=', 'provinces.id')
                ->where('province_name', '=', 'Nusa Tenggara Timur')
                ->get();
        return view('tour', compact('tourData'));
    }

    public function filterBeach(Request $request) {
        $category = $request->query('category');
        $tours = Tour::join('tour_places', 'tours.id', '=', 'tour_places.tour_id')
                ->join('places', 'tour_places.place_id', '=', 'places.id')
                ->join('tour_categories', 'tours.id', '=', 'tour_categories.tour_id')
                ->join('categories', 'tour_categories.category_id', '=', 'categories.id')
                ->where('category_name', '=', 'Beach')
                ->get();
        return view('tour', compact('tourData'));
    }

    public function filterCamping(Request $request) {
        $category = $request->query('category');
        $tours = Tour::join('tour_places', 'tours.id', '=', 'tour_places.tour_id')
                ->join('places', 'tour_places.place_id', '=', 'places.id')
                ->join('tour_categories', 'tours.id', '=', 'tour_categories.tour_id')
                ->join('categories', 'tour_categories.category_id', '=', 'categories.id')
                ->where('category_name', '=', 'Camping')
                ->get();
        return view('tour', compact('tourData'));
    }

    public function filterDayTrip(Request $request) {
        $category = $request->query('category');
        $tours = Tour::join('tour_places', 'tours.id', '=', 'tour_places.tour_id')
                ->join('places', 'tour_places.place_id', '=', 'places.id')
                ->join('tour_categories', 'tours.id', '=', 'tour_categories.tour_id')
                ->join('categories', 'tour_categories.category_id', '=', 'categories.id')
                ->where('category_name', '=', 'Day Trip')
                ->get();
        return view('tour', compact('tourData'));
    }

    public function filterHiking(Request $request) {
        $category = $request->query('category');
        $tours = Tour::join('tour_places', 'tours.id', '=', 'tour_places.tour_id')
                ->join('places', 'tour_places.place_id', '=', 'places.id')
                ->join('tour_categories', 'tours.id', '=', 'tour_categories.tour_id')
                ->join('categories', 'tour_categories.category_id', '=', 'categories.id')
                ->where('category_name', '=', 'Hiking')
                ->get();
        return view('tour', compact('tourData'));
    }

    public function filterIsland(Request $request) {
        $category = $request->query('category');
        $tours = Tour::join('tour_places', 'tours.id', '=', 'tour_places.tour_id')
                ->join('places', 'tour_places.place_id', '=', 'places.id')
                ->join('tour_categories', 'tours.id', '=', 'tour_categories.tour_id')
                ->join('categories', 'tour_categories.category_id', '=', 'categories.id')
                ->where('category_name', '=', 'Island')
                ->get();
        return view('tour', compact('tourData'));
    }

    public function filterLongTrip(Request $request) {
        $category = $request->query('category');
        $tours = Tour::join('tour_places', 'tours.id', '=', 'tour_places.tour_id')
                ->join('places', 'tour_places.place_id', '=', 'places.id')
                ->join('tour_categories', 'tours.id', '=', 'tour_categories.tour_id')
                ->join('categories', 'tour_categories.category_id', '=', 'categories.id')
                ->where('category_name', '=', 'Long Trip')
                ->get();
        return view('tour', compact('tourData'));
    }

    public function filterMountain(Request $request) {
        $category = $request->query('category');
        $tours = Tour::join('tour_places', 'tours.id', '=', 'tour_places.tour_id')
                ->join('places', 'tour_places.place_id', '=', 'places.id')
                ->join('tour_categories', 'tours.id', '=', 'tour_categories.tour_id')
                ->join('categories', 'tour_categories.category_id', '=', 'categories.id')
                ->where('category_name', '=', 'Mountain')
                ->get();
        return view('tour', compact('tourData'));
    }

    public function filterPark(Request $request) {
        $category = $request->query('category');
        $tours = Tour::join('tour_places', 'tours.id', '=', 'tour_places.tour_id')
                ->join('places', 'tour_places.place_id', '=', 'places.id')
                ->join('tour_categories', 'tours.id', '=', 'tour_categories.tour_id')
                ->join('categories', 'tour_categories.category_id', '=', 'categories.id')
                ->where('category_name', '=', 'Park')
                ->get();
        return view('tour', compact('tourData'));
    }

    public function filterShortTrip(Request $request) {
        $category = $request->query('category');
        $tours = Tour::join('tour_places', 'tours.id', '=', 'tour_places.tour_id')
                ->join('places', 'tour_places.place_id', '=', 'places.id')
                ->join('tour_categories', 'tours.id', '=', 'tour_categories.tour_id')
                ->join('categories', 'tour_categories.category_id', '=', 'categories.id')
                ->where('category_name', '=', 'Short Trip')
                ->get();
        return view('tour', compact('tourData'));
    }

    public function filterSnorkeling(Request $request) {
        $category = $request->query('category');
        $tours = Tour::join('tour_places', 'tours.id', '=', 'tour_places.tour_id')
                ->join('places', 'tour_places.place_id', '=', 'places.id')
                ->join('tour_categories', 'tours.id', '=', 'tour_categories.tour_id')
                ->join('categories', 'tour_categories.category_id', '=', 'categories.id')
                ->where('category_name', '=', 'Snorkeling')
                ->get();
        return view('tour', compact('tourData'));
    }

    public function filterTemple(Request $request) {
        $category = $request->query('category');
        $tours = Tour::join('tour_places', 'tours.id', '=', 'tour_places.tour_id')
                ->join('places', 'tour_places.place_id', '=', 'places.id')
                ->join('tour_categories', 'tours.id', '=', 'tour_categories.tour_id')
                ->join('categories', 'tour_categories.category_id', '=', 'categories.id')
                ->where('category_name', '=', 'Temple')
                ->get();
        return view('tour', compact('tourData'));
    }

}
