<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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
            'firstname' => 'Nish',
            'lastname' => 'Veema',
            'username' => 'ni_veema',
            'roles' => 'user',
            'email' => 'n@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
