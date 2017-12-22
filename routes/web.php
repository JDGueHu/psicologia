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
	Route::get('dias/{id}/asociar_horas',[
		'uses' => 'diasController@asociar_horas',
		'as' => 'dias.asociar_horas'
	]);
	Route::post('dias/asociar_horas_store',[
		'uses' => 'diasController@asociar_horas_store',
		'as' => 'dias.asociar_horas_store'
	]);
	Route::get('dias/{id}/desvincular_horas',[
		'uses' => 'diasController@desvincular_horas',
		'as' => 'dias.desvincular_horas'
	]);
	Route::post('dias/consultar_dias',[
		'uses' => 'diasController@consultar_dias',
		'as' => 'dias.consultar_dias'
	]);
	Route::post('dias/consultar_horas_dia',[
		'uses' => 'diasController@consultar_horas_dia',
		'as' => 'dias.consultar_horas_dia'
	]);
	Route::post('dias/consultar_disponibilidad',[
		'uses' => 'diasController@consultar_disponibilidad',
		'as' => 'dias.consultar_disponibilidad'
	]);

	Route::resource('modalidad','modalidadesController');
	Route::get('modalidad/{id}/destroy',[
		'uses' => 'modalidadesController@destroy',
		'as' => 'modalidad.destroy'
	]);
	Route::get('modalidad/{id}/activar',[
		'uses' => 'modalidadesController@activar',
		'as' => 'modalidad.activar'
	]);

	Route::resource('ciudad_cita','ciudadesCitaController');
	Route::get('ciudad_cita/{id}/destroy',[
		'uses' => 'ciudadesCitaController@destroy',
		'as' => 'ciudad_cita.destroy'
	]);
	Route::get('ciudad_cita/{id}/activar',[
		'uses' => 'ciudadesCitaController@activar',
		'as' => 'ciudad_cita.activar'
	]);
	Route::post('ciudad_cita/consultar_ciudades',[
		'uses' => 'ciudadesCitaController@consultar_ciudades',
		'as' => 'ciudad_cita.consultar_ciudades'
	]);
	Route::post('ciudad_cita/ciudad_usuario_logueado',[
		'uses' => 'ciudadesCitaController@ciudad_usuario_logueado',
		'as' => 'ciudad_cita.ciudad_usuario_logueado'
	]);
	Route::post('ciudad_cita/validar_ciudad_usuario_logueado',[
		'uses' => 'ciudadesCitaController@validar_ciudad_usuario_logueado',
		'as' => 'ciudad_cita.validar_ciudad_usuario_logueado'
	]);

	Route::resource('parametro','parametrosController');
	Route::get('parametro/{id}/destroy',[
		'uses' => 'parametrosController@destroy',
		'as' => 'parametro.destroy'
	]);
	Route::get('parametro/{id}/activar',[
		'uses' => 'parametrosController@activar',
		'as' => 'parametro.activar'
	]);
	Route::post('parametro/consultar_parametros',[
		'uses' => 'parametrosController@consultar_parametros',
		'as' => 'parametro.consultar_parametros'
	]);
});
