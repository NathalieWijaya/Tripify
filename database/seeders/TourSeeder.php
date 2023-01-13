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

        DB::table('tours')->insert([
            'province_id' => '4',
            'tour_title' => 'Nusa Tenggara Timur Trip 2 hari 1 malam',
            'description' => '2 hari 1 malam mengunjungi destinasi wisata di Nusa Tenggara Timur',
            'start_date' => '2023-05-20',
            'end_date' => '2023-05-21',
            'max_slot' => '40',
            'price' => '1500000',
            'highlights' => 'Mengunjungi Pantai Pink
            Mengunjungi Labuan Bajo
            Mengunjungi Pulau Komodo',
            'include' => '3-Star Hotel
            Kendaraan
            Makan Pagi
            Makan Siang
            Makan Malam
            Souvenir
            Tiket Masuk',
            'not_include' => 'Uang Saku',
            'itinerary' => 'Hari Pertama:
            Mengunjungi Pantai Pink (08-00 - 11.00)
            Makan Siang (11.00-14.00)
            Mengunjungi Labuan Bajo (14.00-19.00)
            Makan Malam (19.00-21.00)
            Hari Kedua:
            Sarapan (06.00 - 08.00)
            Mengunjungi Pulau Komodo (08.00-16.00)
            Makan Malam (16.00-18.00)',
            'is_public' => true
        ]);
        DB::table('tours')->insert([
            'province_id' => '2',
            'tour_title' => 'Bali Day Trip',
            'description' => 'Bali Day Trip mengunjungi Pantai Kuta dan Garuda Wisnu Kencana',
            'start_date' => '2023-08-10',
            'end_date' => '2023-08-10',
            'max_slot' => '50',
            'price' => '500000',
            'highlights' => 'Mengunjungi Pantai Kuta
            Mengunjungi Garuda Wisnu Kencana',
            'include' => 'Kendaraan
            Makan Siang
            Makan Malam
            Souvenir
            Tiket Masuk',
            'not_include' => 'Surf Board',
            'itinerary' => 'Mengunjungi Garuda Wisnu Kencana (08-00 - 12.00)
            Makan Siang (12.00-14.00)
            Mengunjungi Pantai Kuta (14.00-17.00)
            Makan Malam (17.00-19.00)',
            'is_public' => true
        ]);
    }
}
