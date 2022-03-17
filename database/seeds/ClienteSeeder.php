<?php

use Illuminate\Database\Seeder;
use App\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cliente = new Cliente();
        $cliente->nombres = 'Cliente1';
        $cliente->apellidos = 'Prueba1';
        $cliente->email = 'cliente1@example.com';
        $cliente->save();

        $cliente = new Cliente();
        $cliente->nombres = 'Cliente';
        $cliente->apellidos = 'Prueba2';
        $cliente->email = 'cliente2@example.com';
        $cliente->save();

        $cliente = new Cliente();
        $cliente->nombres = 'Cliente';
        $cliente->apellidos = 'Prueba3';
        $cliente->email = 'cliente3@example.com';
        $cliente->save();
    }
}
