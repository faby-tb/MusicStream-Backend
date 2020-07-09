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

Route::get('/home', 'ArtistasController@index')->name('home');

Route::get('/artistas', 'ArtistasController@index')->name('artistas.index');
Route::get('/artistas/create', 'ArtistasController@create')->name('artistas.create');
Route::post('/artistas/store', 'ArtistasController@store')->name('artistas.store');

Route::get('/artistas/{artista}/edit', 'ArtistasController@edit')->name('artistas.edit');
Route::put('/artistas/update', 'ArtistasController@update')->name('artistas.update');

Route::delete('/artistas/{artista}', 'ArtistasController@delete')->name('artistas.delete');

Route::get('/artistas/{artista}', 'ArtistasController@show')->name('artistas.show');


Route::get('/canciones/create', 'CancionesController@create')->name('canciones.create');
Route::post('/canciones/store', 'CancionesController@store')->name('canciones.store');


Route::get('/canciones/{cancion}/edit', 'CancionesController@edit')->name('canciones.edit');
Route::put('/canciones/update', 'CancionesController@update')->name('canciones.update');


Route::delete('/canciones/{cancion}', 'CancionesController@delete')->name('canciones.delete');


Route::get('/imagenes/{artista}/create', 'ImagenesController@create')->name('imagenes.create');
Route::post('/imagenes/store', 'ImagenesController@store')->name('imagenes.store');


Route::get('/admin','DashboardController@index')->name('admin.index');
Route::get('/admin/canciones', 'DashboardController@canciones')->name('admin.canciones');
Route::get('/admin/imagenes', 'DashboardController@imagenes')->name('admin.imagenes');