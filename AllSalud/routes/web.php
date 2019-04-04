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
Route::post('admin/deleteEstablecimiento','AjaxController@deleteEstablecimiento');
Route::post('admin/deleteLocacion','AjaxController@deleteLocacion');



/*LOGIN/LOGOUT ROUTES*/

Route::post('/login','ValidationController@login');
Route::get('/logout','ValidationController@logout');

/*ESTABLECIMIENTOS ROUTES*/
Route::get('admin/altaEstablecimiento','EstablecimientoController@altaEstablecimiento');

Route::post('admin/createEstablecimiento','EstablecimientoController@createEstablecimiento');

Route::get('admin/getEstablecimientos','EstablecimientoController@getEstablecimientos');


/*SESSION ROUTES*/

Route::get('session/get','SessionController@accessSessionData');
Route::get('session/set/{username}','ValidationController@login');
Route::post('session/remove','SessionController@deleteSessionData');





Route::get('admin/detalleEstablecimiento/{id}','EstablecimientoController@detalleEstablecimiento');

Route::post('admin/updateEstablecimiento/','EstablecimientoController@updateEstablecimiento');


