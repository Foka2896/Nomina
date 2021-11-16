<?php

namespace Database\Seeders;

use App\Models\CodigoTransporte;
use App\Models\Personal;
use App\Models\personalxvehiculo;
use App\Models\Vehiculo;
use Illuminate\Database\Seeder;

class SemillasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehiculo = Vehiculo::create([
            'placa' => 'zxc123'
        ]);
        $id = Vehiculo::select('placa')->where('placa','zxc123')->first();

        CodigoTransporte::create([
            'Codigo' => '1234567890',
            'Placa' => 'zxc123',
            'Caja' => 12,
            'Fecha' => '2021-05-05'
        ]);
        CodigoTransporte::create([
            'Codigo' => '9876543210',
            'Placa' => 'zxc123',
            'Caja' => 15,
            'Fecha' => '2021-05-05'
        ]);

        Personal::create([
            'Nombre' => 'Juan',
            'Apellido' => 'Londono',
            'Cargo' => 'Conductor'
        ]);

        Personal::create([
            'Nombre' => 'Alejandro',
            'Apellido' => 'Riano',
            'Cargo' => 'Conductor'
        ]);

        Personal::create([
            'Nombre' => 'Karen',
            'Apellido' => 'Fontecha',
            'Cargo' => 'Vendedor'
        ]);
        Personal::create([
            'Nombre' => 'David',
            'Apellido' => 'Rebellon',
            'Cargo' => 'Auxiliar'
        ]);
        Personal::create([
            'Nombre' => 'Santiago',
            'Apellido' => 'Figueroa',
            'Cargo' => 'Auxiliar'
        ]);


    }
}
