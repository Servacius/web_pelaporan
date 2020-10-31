<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class LokasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lokasi')->insert([
            [
                'id' => 1,
                'nama_lokasi' => 'Lantai 1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'nama_lokasi' => 'Lantai 2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'nama_lokasi' => 'Lantai 3',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
