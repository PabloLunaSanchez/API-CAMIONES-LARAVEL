<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('personas')->insert([
            'nombre' => 'Juan',
            'correo' => 'juanito123@gmail.com',
            'telefono' => '8333979462',
            'edad' => 30,
            'categoria' => 'conductor', // O 'admin' según corresponda
        ],
        [
            'nombre' => 'Pedro',
            'correo' => 'pdro_86_hdx@gmail.com',
            'telefono' => '8333156080',
            'edad' => 35,
            'categoria' => 'conductor', // O 'admin' según corresponda
        ]);
    }
}
