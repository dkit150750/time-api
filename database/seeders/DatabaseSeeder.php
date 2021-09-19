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

        DB::table('disciplines')->insert(['name' => 'пусто']);
		DB::table('disciplines')->insert(['name' => 'нет']);
		DB::table('cabinets')->insert(['name' => 'пусто']);
		DB::table('teachers')->insert(['name' => 'пусто']);
		DB::table('times')->insert([
			'first' => '10-10',
			'second' => '10-10',
			'third' => '10-10',
			'fourth' => '10-10',
			'fifth' => '10-10',
		]);
		DB::table('change_times')->insert([
			'first' => '10-10',
			'second' => '10-10',
			'third' => '10-10',
			'fourth' => '10-10',
			'fifth' => '10-10',
		]);
    }
}
