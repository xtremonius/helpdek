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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/reportar', 'HomeController@getReport');
Route::post('/reportar', 'HomeController@postreport');

Route::group(['middleware' => 'admin', 'namespace' => 'Admin'], function (){
    /**
     * Rutas usuarios
     */
    Route::get('/usuarios', 'UserController@index');
    Route::post('/usuarios', 'UserController@store');
    Route::get('/usuario/{id}', 'UserController@edit');
    Route::post('/usuario/{id}', 'UserController@update');
    Route::get('/usuario/{id}/eliminar', 'UserController@delete');
    /**
     * Rutas proyectos
     */
    Route::get('/proyectos', 'ProyectController@index');
    Route::post('/proyectos', 'ProyectController@store');
    Route::get('/proyecto/{id}', 'ProyectController@edit');
    Route::post('/proyecto/{id}', 'ProyectController@update');
    Route::get('/proyecto/{id}/eliminar', 'ProyectController@delete');
    Route::get('/proyecto/{id}/restaurar', 'ProyectController@restore');
    /**
     * Rutas categorias
     */
    Route::post('/categorias', 'CategoryController@store');
    Route::post('/categoria/{id}', 'CategoryController@update');
    /**
     * Rutas niveles
     */
    Route::post('/niveles', 'LevelController@store');
    Route::post('/nivel/{id}', 'LevelController@update');

    Route::get('/config', 'ConfigController@index');
});




