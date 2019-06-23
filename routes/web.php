<?php

use Illuminate\Http\Request;
use App\User;

Route::get('/','HomeController@inicio');
Auth::routes();
Route::post('publicar', 'HomeController@publicar');
Route::post('comentar', 'HomeController@comentar');
Route::post('filtro', 'HomeController@topicid');
Route::post('eliminarpost', 'HomeController@eliminarpost');
Route::post('editarperfil', 'HomeController@editarperfil');
Route::get('profile', 'HomeController@profile');
Route::get('post/{id}', 'HomeController@postid')->where('id', '^[\d]+$');
Route::post('addseccion', 'HomeController@addseccion');
Route::post('addtema', 'HomeController@addtema');
Route::post('addevaluacion', 'HomeController@addevaluacion');
Route::post('addpregunta', 'HomeController@addpregunta');
Route::post('addrespuesta', 'HomeController@addrespuesta');
Route::post('addcontent', 'HomeController@addContent');
Route::post('addcontenttext', 'HomeController@addcontenttext');
Route::get('home', 'HomeController@index')->name('home');
Route::get('videos', 'HomeController@videos');
Route::get('imagenes', 'HomeController@imagenes');
Route::get('estudiantes', 'HomeController@estudiantes');
Route::get('pruebas', 'HomeController@pruebas');

Route::get('tema/{topic}', 'HomeController@topic')->where('topic', '^[A-Za-z0-9_]+$');

Route::get('descarga/{id}', 'HomeController@descarga')->where('id', '^[0-9]+$');
Route::get('historial/{student_id}','HomeController@historial')->name('historial');

// Evaluacion
Route::get('evaluaciones', 'HomeController@evaluaciones');
Route::get('estudiante/evaluacion/{id}','testController@evaluacion_estudiante')->name('estudiante.evaluacion');
Route::post('pregunta/guardar','testController@pregunta_guardar')->name('pregunta.guardar');
Route::get('respuesta/{id_test}/{id_question}','testController@respuesta')->name('respuesta');
Route::post('respuesta/guardar','testController@respuesta_guardar')->name('respuesta.guardar');
Route::get('evaluacion/{id}','testController@evaluacion')->name('evaluacion.ver');
Route::get('pregunta/{id_test}','testController@pregunta')->name('pregunta');

// Notas
Route::get('nota/{people}/{test}/{question}/{answer}','testController@nota')->name('nota.nueva');
Route::post('asignar/nota','testController@asignar_nota')->name('nota.asignar');