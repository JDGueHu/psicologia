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

});
