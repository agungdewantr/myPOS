<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Agung',
            'email' => 'agung@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'Pemilik'
        ]);
        DB::table('users')->insert([
            'name' => 'Rendi',
            'email' => 'rendi@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'Karyawan'
        ]);
    }
}
