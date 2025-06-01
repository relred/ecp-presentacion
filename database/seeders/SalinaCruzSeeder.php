<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalinaCruzSeeder extends Seeder
{
    public function run()
    {
        DB::table('municipalities')->insert([
            'name' => 'Salina Cruz',
            'state' => 'Oaxaca',
            'goal' => 0, // Adjust this number as needed
            'mobilized' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
} 