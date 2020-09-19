<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('productos')->insert(array(
            'nombre'                => 'Hidromiel',
            'precio'                => 30,
            'imagen'                => env('APP_URL').'/images/hidro.jpg',
            'stock'                 => 10,
            'fecha'                 => '2017-03-28',
            'descripcion'	        => 'Hidromiel de calidad'

        ));
    }
}
