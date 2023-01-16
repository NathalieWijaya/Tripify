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

        DB::table('tour_places')->insert([
            'tour_id' => '4',
            'place_id' => '15'
        ]);
        DB::table('tour_places')->insert([
            'tour_id' => '4',
            'place_id' => '16'
        ]);
        DB::table('tour_places')->insert([
            'tour_id' => '4',
            'place_id' => '17'
        ]);
        DB::table('tour_places')->insert([
            'tour_id' => '5',
            'place_id' => '8'
        ]);
        DB::table('tour_places')->insert([
            'tour_id' => '5',
            'place_id' => '9'
        ]);
    }
}
