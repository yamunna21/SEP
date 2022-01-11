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
        DB::table('users')->insert([

            'firstname' => ('Maghesan'),
            'lastname' => ('Sathasivam'),
            'phonenum' => ('01111402286'),
            'address' => ('Seri Pagi'),
            'email' => ('imusstarg4l@gmail.com'),
            'username' => ('maghesan'),
            'password' => Hash::make('maghesan'),
            'user_type' => ('Staff'),
        ]);
    }
}
