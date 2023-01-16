<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carts')->insert([
            'user_id' => '2',
            'tour_id' => '1',
            'quantity' => '3'
        ]);
        DB::table('carts')->insert([
            'user_id' => '2',
            'tour_id' => '2',
            'quantity' => '1'
        ]);
        DB::table('carts')->insert([
            'user_id' => '3',
            'tour_id' => '1',
            'quantity' => '1'
        ]);
        DB::table('carts')->insert([
            'user_id' => '3',
            'tour_id' => '3',
            'quantity' => '1'
        ]);
    }
}
