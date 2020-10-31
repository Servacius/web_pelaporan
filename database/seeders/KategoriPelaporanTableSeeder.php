<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class KategoriPelaporanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategory_pelaporan')->insert([
            [
                'id' => 1,
                'nama_kategori' => 'Hilang',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'nama_kategori' => 'Rusak',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'nama_kategori' => 'Temuan',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
