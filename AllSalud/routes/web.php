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

Route::get('/','frontController@index');
Route::get('/admin','frontController@indexAdmin');

Route::get('/admin/home','frontController@adminHome');


Route::get('/prueba/','PruebaController@form');
Route::post('/prueba/datos/','PruebaController@datos');


/*AJAX ROUTES*/

Route::post('/buscarCiudadSegunProvincia','AjaxController@buscarCiudadSegunProvincia');
Route::post('/buscarPorTipoEstablecimiento','AjaxController@buscarPorTipoEstablecimiento');


/*LOGIN ROUTES*/

Route::post('/login','ValidationController@login');

/*ESTABLECIMIENTOS ROUTES*/
Route::get('admin/altaEstablecimiento','EstablecimientoController@altaEstablecimiento');

Route::post('admin/createEstablecimiento','EstablecimientoController@createEstablecimiento');

Route::get('admin/eliminarEstablecimiento','EstablecimientoController@eliminarEstablecimiento');

Route::get('admin/eliminarEstablecimiento2','EstablecimientoController@eliminarEstablecimiento2');

Route::get('admin/detalleEstablecimiento/{id}','EstablecimientoController@detalleEstablecimiento');


