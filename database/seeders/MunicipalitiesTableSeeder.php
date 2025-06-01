<?php

namespace Database\Seeders;

use App\Models\Municipality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MunicipalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $municipalities = [
            ['name' => 'Acapulco', 'state' => 'Guerrero'],
            ['name' => 'El Salto', 'state' => 'Jalisco'],
            ['name' => 'Chilon', 'state' => 'Chiapas'],
            ['name' => 'Ensenada', 'state' => 'Baja California'],
            ['name' => 'Huajuapan', 'state' => 'Oaxaca'],
            ['name' => 'Huatulco', 'state' => 'Oaxaca'],
            ['name' => 'San Luis Potosí', 'state' => 'San Luis Potosí'],
            ['name' => 'Uruapan', 'state' => 'Michoacán'],
        ];

        foreach ($municipalities as $mun) {
            Municipality::create([
                'name' => $mun['name'],
                'state' => $mun['state'],
                'goal' => 0,
                'mobilized' => 0
            ]);
        }
    }
}
