er<?php

use Illuminate\Database\Seeder;
use App\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $producto = new Producto();
        $producto->nombre = 'Producto 1';
        $producto->cantidad = 5;
        $producto->precio = 10.33;
        $producto->save();

        $producto = new producto();
        $producto->nombre = 'Producto 2';
        $producto->cantidad = 10;
        $producto->precio = 25.75;
        $producto->save();

        $producto = new producto();
        $producto->nombre = 'Producto 3';
        $producto->cantidad = 2;
        $producto->precio = 50;
        $producto->save();
    }
}
