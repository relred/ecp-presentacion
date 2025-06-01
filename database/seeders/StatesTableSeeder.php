<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\State;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            'Aguascalientes', 'Baja California', 'Baja California Sur', 'Campeche',
            'Chiapas', 'Chihuahua', 'Coahuila', 'Colima', 'Ciudad de México',
            'Durango', 'Guanajuato', 'Guerrero', 'Hidalgo', 'Jalisco',
            'Estado de México', 'Michoacán', 'Morelos', 'Nayarit', 'Nuevo León',
            'Oaxaca', 'Puebla', 'Querétaro', 'Quintana Roo', 'San Luis Potosí',
            'Sinaloa', 'Sonora', 'Tabasco', 'Tamaulipas', 'Tlaxcala',
            'Veracruz', 'Yucatán', 'Zacatecas'
        ];

        foreach ($states as $state) {
            State::create([
                'name' => $state,
                'goal' => 0,
                'mobilized' => 0
            ]);
        }
    }
}
