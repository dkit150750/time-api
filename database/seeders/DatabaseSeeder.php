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
        $users = [
            ['login' => 'admin', 'password' => Hash::make('password')],
            ['login' => 'teleskop', 'password' => Hash::make('password')],
        ];
        DB::table('users')->insert($users);
    }
}
