<?php

namespace Database\Seeders;

use App\Models\TransactionDetail;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            ProvinceSeeder::class,
            PlaceSeeder::class,
            StatusSeeder::class,
            RequestTripSeeder::class,
            RequestPlaceSeeder::class,
            TourSeeder::class,
            TourPlaceSeeder::class,
            TourCategorySeeder::class,
            CartSeeder::class,
            TransactionSeeder::class,
            TransactionDetailSeeder::class
            
        ]);
    }
}
