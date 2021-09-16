<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
         DB::table('users')->insert([
            'name' => 'Dendi',
            'address' => 'Garut',
            'telp' => '08523525524',
            'email' => 'dendi@gmail.com',
            'role' => '1',
            'password' => Hash::make('12345678'),
        ]);
    }
}
