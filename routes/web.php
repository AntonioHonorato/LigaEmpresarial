<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', 'EquiposController');
//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

//Route::middleware(['auth'])->group(function(){
    Route::resource('/equipos', 'EquiposController');
    Route::resource('/jugadores', 'JugadoresController');
    Route::resource('/grupos','GruposController');
    Route::resource('/tarjetas','TarjetasController');
    Route::resource('/cedes', 'CedesController');
    Route::resource('/tipostorneos', 'TiposTorneosController');
    
    
//});