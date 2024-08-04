<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('game')->insert([
            ['name' => 'Game 1'],
            ['name' => 'Game 2'],
            ['name' => 'Game 3'],
        ]);
    }
}
