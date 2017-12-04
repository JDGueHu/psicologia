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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('registrarseStore',[
	'uses' => 'Auth\RegisterController@registrarseStore',
	'as' => 'registrarseStore'
]);

Route::post('consultar_dias',[
	'uses' => 'disponibilidadController@consultar_dias',
	'as' => 'centroTrabajo.consultar_dias'
]);


Route::group(['prefix'=>'configuracion','middleware' => 'auth'],function(){

	Route::resource('dias','diasController');
	Route::get('dias/{id}/destroy',[
		'uses' => 'diasController@destroy',
		'as' => 'dias.destroy'
	]);
	Route::get('dias/{id}/activar',[
		'uses' => 'diasController@activar',
		'as' => 'dias.activar'
	]);
	Route::get('dias/{id}/consultar_horas',[
		'uses' => 'diasController@consultar_horas',
		'as' => 'dias.consultar_horas'
	]);
});
