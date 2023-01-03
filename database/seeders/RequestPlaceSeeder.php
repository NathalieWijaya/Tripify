<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestPlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('request_places')->insert([
            'request_id' => '1',
            'place_id' => '1'
        ]);
        DB::table('request_places')->insert([
            'request_id' => '2',
            'place_id' => '6'
        ]);
        DB::table('request_places')->insert([
            'request_id' => '2',
            'place_id' => '7'
        ]);
    }
}
