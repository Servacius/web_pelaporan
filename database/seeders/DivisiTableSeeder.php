<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DivisiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('divisi')->insert([
            [
                'id' => 1,
                'nama_divisi' => 'IT',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'nama_divisi' => 'FAT',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'nama_divisi' => 'HR',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
