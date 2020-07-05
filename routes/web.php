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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/artistas', 'ArtistasController@index')->name('artistas.index');
Route::get('/artistas/create', 'ArtistasController@create')->name('artistas.create');
Route::post('/artistas/store', 'ArtistasController@store')->name('artistas.store');

Route::get('/artistas/{artista}/edit', 'ArtistasController@edit')->name('artistas.edit');
Route::put('/artistas/update', 'ArtistasController@update')->name('artistas.update');

Route::delete('/artistas/{artista}', 'ArtistasController@delete')->name('artistas.delete');

Route::get('/artistas/{artista}', 'ArtistasController@show')->name('artistas.show');

