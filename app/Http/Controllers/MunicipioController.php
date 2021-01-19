<?php

namespace App\Http\Controllers;

use App\Municipio;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        $municipios=Municipio::all();
        $municipios->load("getEstado");
        return $municipios;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Municipios.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        $validators=Validator::make($request->all(),
            [
                'nombre'=> 'required|max:100',
                'id_estado'=>'required',
            ]);
        if($validators->fails())
            return response()->json($validators->messager(),200);
        $municipio=array(
            "nombre"=>$request->get("nombre"),
            "id_estado"=>$request->get("id_estado")
        );
        $municipio=Municipio::create($municipio);
        return $municipio;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function show(Municipio $municipio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function edit(Municipio $municipio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Municipio $municipio)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        $validators=Validator::make($request->all(),
            [
                'nombre'=> 'required|max:100',
                'id_estado'=> 'required|max:100',
            ]);
        if($validators->fails())
            return response()->json($validators->messager(),200);

        $municipio->update($request->all());
        return $municipio;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Municipio $municipio)
    {
        $request->user()->authorizeRoles(['admin']);
        $municipio->delete();
        return response()->json(["message"=>"ELIMINADO CORRECTAMENTE"],200);
    }
}
