<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
            [
                'id' => 1,
                'kategory_id' => 1,
                'name' => 'Baru',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'kategory_id' => 1,
                'name' => 'Belum Ditemukan',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'kategory_id' => 1,
                'name' => 'Sudah Ditemukan',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'kategory_id' => 1,
                'name' => 'Selesai',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'kategory_id' => 2,
                'name' => 'Baru',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 6,
                'kategory_id' => 2,
                'name' => 'Sedang Dicek',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 7,
                'kategory_id' => 2,
                'name' => 'Sedang Diperbaiki/Diganti',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 8,
                'kategory_id' => 2,
                'name' => 'Selesai',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 9,
                'kategory_id' => 3,
                'name' => 'Baru',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 10,
                'kategory_id' => 3,
                'name' => 'Pemilik Barang Belum Ditemukan',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 11,
                'kategory_id' => 3,
                'name' => 'Pemilik Barang Sudah Ditemukan',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 12,
                'kategory_id' => 3,
                'name' => 'Sudah Dikembalikan',
                'created_at' => now(),
                'updated_at' => now()
            ]
            [
                'id' => 13,
                'kategory_id' => 3,
                'name' => 'Selesai',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
