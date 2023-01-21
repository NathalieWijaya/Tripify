<?php

namespace App\Http\Livewire;

use App\Models\Place;
use App\Models\Province;
use App\Models\Tour;
use App\Models\TourPlace;
use Livewire\Component;

class ProvincePlace extends Component
{

    public $provinces;
    public $places;

    public $selectedProvince = [];
    public $selectedPlace = [];
    public function mount($selectedPlace = []){
        $this->provinces = Province::all();
        $this->places = collect();
        $this->selectedPlace = $selectedPlace;
        

        if(!is_null($selectedPlace)){
            $place = Place::with('province')->find($selectedPlace);
            if($place) {
                foreach ($place as $key) {
                    $this->places = Place::where('province_id', $key->province_id)->get();
                    $this->selectedProvince = $key->province_id;
                }
            }
        }
        
    }

    public function render()
    {
        return view('livewire.province-place');
    }
        public function updatedSelectedProvince($province){
        $this->places = Place::where('province_id', $province)->get();
    }


    /**
     */
}
