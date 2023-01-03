<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourPlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tour_places')->insert([
            'tour_id' => '1',
            'place_id' => '1'
        ]);
        DB::table('tour_places')->insert([
            'tour_id' => '2',
            'place_id' => '10'
        ]);
        DB::table('tour_places')->insert([
            'tour_id' => '2',
            'place_id' => '11'
        ]);
        DB::table('tour_places')->insert([
            'tour_id' => '2',
            'place_id' => '12'
        ]);
        DB::table('tour_places')->insert([
            'tour_id' => '2',
            'place_id' => '13'
        ]);
        DB::table('tour_places')->insert([
            'tour_id' => '3',
            'place_id' => '11'
        ]);
        DB::table('tour_places')->insert([
            'tour_id' => '3',
            'place_id' => '12'
        ]);
    }
}
