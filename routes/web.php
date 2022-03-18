<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth', 'middleware' => 'verified'], function	() {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/catalog', 'ProductoController@catalogo')->name('catalogo');

    Route::resource('clientes', 'ClienteController');
    Route::resource('productos', 'ProductoController');

    Route::get('carrito/{sesion}','CarritoController@mostrarcarrito')->name('carrito');

    Route::post('/carrito','CarritoController@agregaritem')->name('carrito.agregaritem');

    Route::post('carrito/{item}','CarritoController@removeitem')->name('carrito.removeitem');

    Route::get('vaciar/{sesion}','CarritoController@vaciarcarrito')->name('carrito.vaciar');
});
