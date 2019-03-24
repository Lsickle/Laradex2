<?php

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

route::get('prueba/123/{locura}', 'controladorprueba@prueba');

route::resource('trainers', 'TrainerController');
route::resource('Pokemons', 'PokemonController');
route::post('trainers/{trainer}/pokemons', 'PokemonController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
