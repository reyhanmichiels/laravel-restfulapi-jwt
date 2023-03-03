<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => "reyhan",
            'email' => 'reyhan@gmail.com',
            'password' => 'rahasia',
        ]);

        DB::table('users')->insert([
            'name' => "james",
            'email' => 'james@gmail.com',
            'password' => 'rahasia',
        ]);

        DB::table('users')->insert([
            'name' => "budi",
            'email' => 'budi@gmail.com',
            'password' => 'rahasia',
        ]);
    }
}
