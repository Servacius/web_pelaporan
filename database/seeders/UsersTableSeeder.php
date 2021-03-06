<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'email' => 'admin@material.com',
                'account_type_id' => 1,
                'password' => Hash::make('secret'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'lalaland',
                'last_name' => 'lalaland',
                'email' => 'lalaland@material.com',
                'account_type_id' => 2,
                'password' => Hash::make('lalaland'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
