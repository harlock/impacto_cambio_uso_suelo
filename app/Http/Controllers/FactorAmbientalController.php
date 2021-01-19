<?php

namespace App\Http\Controllers;

use App\FactorAmbiental;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class FactorAmbientalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        $factores=FactorAmbiental::all();
        $factores->load("getVariable");
        return $factores;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("FactorAmbiental.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $validators=Validator::make($request->all(),
            [
                'nombre_factor'=> 'required|max:100',
                'id_variable'=>'required',
            ]);
        if($validators->fails())
            return response()->json($validators->messager(),200);
        $factor=array(
            "nombre_factor"=>$request->get("nombre_factor"),
            "id_variable"=>$request->get("id_variable")
        );
        $factor=FactorAmbiental::create($factor);
        return $factor;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FactorAmbiental  $factor
     * @return \Illuminate\Http\Response
     */
    public function show(FactorAmbiental $factor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FactorAmbiental  $factor
     * @return \Illuminate\Http\Response
     */
    public function edit(FactorAmbiental $factor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FactorAmbiental  $factor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FactorAmbiental $factor)
    {
        $request->user()->authorizeRoles(['admin']);
        $validators=Validator::make($request->all(),
            [
                'nombre_factor'=> 'required|max:100',
                'id_variable'=> 'required|max:100',
            ]);
        if($validators->fails())
            return response()->json($validators->messager(),200);

        $factor->update($request->all());
        return $factor;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FactorAmbiental  $factor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,FactorAmbiental $factor)
    {
        $request->user()->authorizeRoles(['admin']);
        $factor->delete();
        return response()->json(["message"=>"ELIMINADO CORRECTAMENTE"],200);
    }
}
