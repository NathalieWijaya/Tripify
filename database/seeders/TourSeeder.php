<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tours')->insert([
            'province_id' => '1',
            'tour_title' => 'Jakarta Day Trip',
            'description' => 'Taman Mini Indonesia Indah (TMII) merupakan kawasan wisata bertema budaya Indonesia yang berlokasi di Jakarta Timur. Kamu dapat melihat miniatur kepulauan Indonesia, menaiki kereta gantung, mengunjungi museum, Teater IMAX Keong Mas dan Teater Tanah Airku di TMII. Kamu bisa berfoto dan mengetahui banyak hal tentang sejarah Indonesia di TMII. Yuk, berwisata ke TMII bersama tur kami! Tur kami sangat menarik, kamu akan berjalan-jalan di TMII bersama dengan pemandu kami dan diantar oleh pengemudi yang bisa berbicara beberapa bahasa, menjadikan perjalananmu lebih mudah dan menyenangkan!',
            'start_date' => '2023-09-10',
            'end_date' => '2023-09-10',
            'max_slot' => 50,
            'price' => '850000',
            'highlights' => 'Wisata Kebudayaan
Bermain Games
Mencoba Wahana Permainan di Taman Mini',
            'include' => 'Tiket Masuk
Makan Pagi
Makan Siang
Makan Malam
Souvenir',
            'itinerary' => 'Wisata Kebudayaan(08.00-10.00)
Bermain Games(10.00-12.00)
Makan Siang(12.00-14.00)
Wahana Permainan(14.00-17.00)
Makan Malam(17.00-19.00)',
            'is_public' => true
        ]);
        DB::table('tours')->insert([
            'province_id' => '3',
            'tour_title' => 'Jalan-jalan keliling Jogja 2 hari 1 malam',
            'description' => 'Tour 2 Hari 1 Malam, mengunjungi destinasi wisata di jogja meliputi Jalan Malioboro, Candi Prambanan dan berbagai tempat lainnya',
            'start_date' => '2023-09-11',
            'end_date' => '2023-09-12',
            'max_slot' => '20',
            'price' => '1500000',
            'highlights' => 'Mengunjungi Keraton Yogyakarta
Mengunjungi Candi Prambanan
Mengunjungi Tuju Jogja
Mengunjungi Jalan Malioboro ',
            'include' => '3-star Hotel
Makan Pagi
Makan Siang
Makan Malam
Souvenir',
            'itinerary' => 'Hari Pertama:
Mengunjungi Keraton Yogyakarta(08.00-12.00)
Makan Siang(12.00-14.00)
WMengunjungi Jalan Malioboro(14.00-18.00)
Makan Malam(18.00-20.00)
Hari Kedua:
Mengunjungi Candi Prambanan(08.00-12.00)
Makan Siang(12.00-14.00)
Mengunjungi Tugu Jogja(14.00-17.00)
Makan Malam(17.00-19.00)',
            'is_public' => true
        ]);
        DB::table('tours')->insert([
            'province_id' => '3',
            'tour_title' => 'Jogja Day Trip',
            'description' => 'Day Trip Tour, mengunjungi destinasi wisata di jogja meliputi Jalan Malioboro dan Candi Prambanan',
            'start_date' => '2023-09-13',
            'end_date' => '2023-09-13',
            'max_slot' => '100',
            'price' => '600000',
            'highlights' => 'Mengunjungi Candi Prambanan
Mengunjungi Jalan Malioboro',
            'include' => 'Makan Siang
Makan Malam
Souvenir',
            'itinerary' => 'Mengunjungi Candi Prambanan(08.00-12.00)
Makan Siang(12.00-14.00)
Mengunjungi Jalan Malioboro(14.00-17.00)
Makan Malam(17.00-19.00)',
            'is_public' => true
        ]);
    }
}
