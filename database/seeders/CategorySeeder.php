<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'title' => 'Wisata',
                'slug' => 'wisata',
                'description' => 'Dinas Pariwisata Buton Selatan – Menyediakan Informasi mengenai Destinasi Wisata.',
                'parent_id' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Kuliner',
                'slug' => 'kuliner',
                'description' => 'Dinas Pariwisata Buton Selatan – Informasi Seputar Wisata Kuliner yang menghadirkan cita rasa khas.',
                'parent_id' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Hotel',
                'slug' => 'hotel',
                'description' => 'Dinas Pariwisata Buton Selatan - Informasi Tempat Menginap baik hotel, homestay maupun losmen.',
                'parent_id' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Wisata Pantai',
                'slug' => 'wisata-pantai',
                'description' => 'Dinas Pariwisata Buton Selatan - Informasi Tempat Menginap baik hotel, homestay maupun losmen.',
                'parent_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Wisata Alam',
                'slug' => 'wisata-alam',
                'description' => 'Dinas Pariwisata Buton Selatan - Informasi Tempat Menginap baik hotel, homestay maupun losmen.',
                'parent_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
