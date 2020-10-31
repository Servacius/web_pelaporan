<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AccountTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account_type')->insert([
            [
                'account_type_id' => 1,
                'account_type' => 'Admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'account_type_id' => 2,
                'account_type' => 'Pelapor',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
