<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=> 'admin123',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'is_admin' => true
        ]);
        DB::table('users')->insert([
            'name'=> 'user123',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user123'),
            'is_admin' => false
        ]);
        DB::table('users')->insert([
            'name'=> 'user12345',
            'email' => 'user12345@gmail.com',
            'password' => bcrypt('user12345'),
            'is_admin' => false
        ]);
    }
}
