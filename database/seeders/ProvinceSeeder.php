<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->insert([
            'province_name' => 'Jakarta'
        ]);
        DB::table('provinces')->insert([
            'province_name' => 'Bali'
        ]);
        DB::table('provinces')->insert([
            'province_name' => 'Daerah Istimewa Yogyakarta'
        ]);
        DB::table('provinces')->insert([
            'province_name' => 'Nusa Tenggara Timur'
        ]);
        
    }
}
