<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'status_name' => 'Waiting'
        ]);
        DB::table('statuses')->insert([
            'status_name' => 'Approved'
        ]);
        DB::table('statuses')->insert([
            'status_name' => 'Rejected'
        ]);
    }
}
