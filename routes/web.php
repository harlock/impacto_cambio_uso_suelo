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
Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::get('/register', function () {
    return view('auth.register');
});

Auth::routes();

Route::group(['middleware' => ['auth']],function(){

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/evaluacion/{id}', function ($id) {
        return view('Evaluaciones.index',compact('id'));
    });
    Route::get('/estado', function () {
        return view('Estados.index');
    });
    Route::get('/criterio', function () {
        return view('Criterios.index');
    });
    Route::get('/tipo', function () {
        return view('TipoProyectos.index');
    });
    Route::get('/etapa', function () {
        return view('Etapas.index');
    });
    Route::get('/subsistema', function () {
        return view('Subsistemas.index');
    });
    Route::get('/municipio', function () {
        return view('Municipios.index');
    });
    Route::get('/variable', function () {
        return view('Variables.index');
    });
    Route::get('/factor', function () {
        return view('Factoresambientales.index');
    });
    Route::get('/atributo', function () {
        return view('Atributos.index');
    });
    Route::get('/proyectos', function () {
        return view('Proyectos.index');
    });
    Route::get('/colonia', function () {
        return view('Colonias.index');
    });
    Route::get('/asigna', function () {
        return view('Asignacriterios.index');
    });
    Route::get('/total/{id}', function ($id) {
        return view('Evaluaciones.result',compact('id'));
    });
    Route::get('/user', function () {
        return view('Users.index');
    });
    Route::get('/compania', function () {
        return view('Compañias.index');
    });

    Route::post("pdf/resultados/{id}","ResultadosTotalesController@pdf_all");
});
