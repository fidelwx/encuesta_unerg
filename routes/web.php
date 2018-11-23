<?php

Auth::routes();

Route::get('/', function () {
    return view('auth/my_register_login');
});

Route::get('encuesta', 'HomeController@index')->name('home');

Route::post('respuesta', 'HomeController@storeAnswer')->name('storeAnswer');
Route::post('registrar', 'usuariosController@userpeople')->name('userpeople');

Route::group(['prefix' => 'admin'],function(){
	// Route::resource('usuarios','usuariosController');
	Route::resource('preguntas','preguntasController');

});
