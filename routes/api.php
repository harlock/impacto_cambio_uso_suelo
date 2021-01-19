<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => ['auth:api']],function(){

    Route::resource("estado","EstadoController",["except"=>["create","edit","show"]]);
    Route::resource("criterio","CriterioController",["except"=>["create","edit","show"]]);
    Route::resource("tipo","TipoProyectoController",["except"=>["create","edit","show"]]);
    Route::resource("etapa","EtapaController",["except"=>["create","edit","show"]]);
    Route::resource("subsistema","SubsistemaController",["except"=>["create","edit","show"]]);
    Route::resource("municipio","MunicipioController",["except"=>["create","edit","show"]]);
    Route::resource("variable","VariableController",["except"=>["create","edit","show"]]);
    Route::resource("factor","FactorAmbientalController",["except"=>["create","edit","show"]]);
    Route::resource("colonia","ColoniaController",["except"=>["create","edit","show"]]);
    Route::resource("asigna","AsignaCriterioController",["except"=>["create","edit","show"]]);
    Route::get("asigna/{proyecto}/{asigna}","AsignaCriterioController@show");

    Route::resource("proyecto","ProyectoController",["except"=>["create","edit","show"]]);
    Route::resource("tipusers","TipoUsuarioController",["except"=>["create","edit","show"]]);
    Route::resource("compania","CompaniaController",["except"=>["create","edit","show"]]);


    Route::resource("evaluacion/{id}","EvaluacionController",["except"=>["create","edit","show"],
        'parameters'=>['{id}'=>'evaluation']]);


    Route::resource("user","UserController",['except'=>['create','edit','show']]);
    Route::get("list/user",function (){
        return \App\User::all();
    });

    Route::group(['middleware'=>["check.proyect.user"]],function (){
        Route::delete("proyecto/{proyecto}","ProyectoController@destroy");
    });

    Route::get('/total', 'ResultadosTotalesController@show');

    Route::resource("total","ResultadosTotalesController",['except'=>['index'],'parameters'=>['{id}'=>'totall']]);
});











