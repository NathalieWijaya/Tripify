<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('places')->insert([
            'place_name' => 'Taman Mini Indonesia Indah',
            'place_image' => 'TamanMini.jpg',
            'province_id' => '1',
        ]);
        DB::table('places')->insert([
            'place_name' => 'Monas',
            'place_image' => 'Monas.jpg',
            'province_id' => '1',
        ]);
        DB::table('places')->insert([
            'place_name' => 'Taman Margasatwa Ragunan',
            'place_image' => 'Ragunan.jpg',
            'province_id' => '1',
        ]);
        DB::table('places')->insert([
            'place_name' => 'Kota Tua',
            'place_image' => 'KotaTua.jpg',
            'province_id' => '1',
        ]);
        DB::table('places')->insert([
            'place_name' => 'Taman Impian Jaya Ancol',
            'place_image' => 'Ancol.jpg',
            'province_id' => '1',
        ]);
        DB::table('places')->insert([
            'place_name' => 'Tanah Lot',
            'place_image' => 'TanahLot.jpg',
            'province_id' => '2',
        ]);
        DB::table('places')->insert([
            'place_name' => 'Bukit Campuhan',
            'place_image' => 'BukitCampuhan.jpg',
            'province_id' => '2',
        ]);
        DB::table('places')->insert([
            'place_name' => 'Pantai Kuta',
            'place_image' => 'Kuta.jpg',
            'province_id' => '2',
        ]);
        DB::table('places')->insert([
            'place_name' => 'Garuda Wisnu Kencana',
            'place_image' => 'GWK.jpg',
            'province_id' => '2',
        ]);
        DB::table('places')->insert([
            'place_name' => 'Keraton Yogyakarta',
            'place_image' => 'Keraton.jpg',
            'province_id' => '3',
        ]);
        DB::table('places')->insert([
            'place_name' => 'Candi Prambanan',
            'place_image' => 'Prambanan.jpg',
            'province_id' => '3',
        ]);
        DB::table('places')->insert([
            'place_name' => 'Jalan Malioboro',
            'place_image' => 'Malioboro.jpg',
            'province_id' => '3',
        ]);
        DB::table('places')->insert([
            'place_name' => 'Tugu Jogja',
            'place_image' => 'Tugu.jpg',
            'province_id' => '3',
        ]);
        DB::table('places')->insert([
            'place_name' => 'Danau Kelimutu',
            'place_image' => 'DanauKelimutu.jpg',
            'province_id' => '4',
        ]);
        DB::table('places')->insert([
            'place_name' => 'Pulau Komodo',
            'place_image' => 'PulauKomodo.jpg',
            'province_id' => '4',
        ]);
        DB::table('places')->insert([
            'place_name' => 'Labuan Bajo',
            'place_image' => 'LabuanBajo.jpg',
            'province_id' => '4',
        ]);
        DB::table('places')->insert([
            'place_name' => 'Pantai Pink',
            'place_image' => 'PantaiPink.jpg',
            'province_id' => '4',
        ]);
    }
}
