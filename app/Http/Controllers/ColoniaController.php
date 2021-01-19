<?php

namespace App\Http\Controllers;

use App\Municipio;
use App\Colonia;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ColoniaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        $colonias=Colonia::all();
        $colonias->load("getMunicipio");
        return $colonias;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
                'nombre_colonia'=> 'required|max:100',
                'id_municipio'=>'required',
                'codigo_postal'=>'required|max:100',
            ]);
        if($validators->fails())
            return response()->json($validators->messager(),200);
        $colonia=array(
            "nombre_colonia"=>$request->get("nombre_colonia"),
            "id_municipio"=>$request->get("id_municipio"),
            "codigo_postal"=>$request->get("codigo_postal"),
        );
        $colonia=Colonia::create($colonia);
        return $colonia;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Colonia  $colonia
     * @return \Illuminate\Http\Response
     */
    public function show(Colonia $colonia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Colonia  $colonia
     * @return \Illuminate\Http\Response
     */
    public function edit(Colonia $colonia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Colonia  $colonia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Colonia $colonium)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        $validators=Validator::make($request->all(),
            [
                'nombre_colonia'=> 'required|max:100',
                'id_municipio'=> 'required|max:100',
                'codigo_postal'=> 'required|max:100',
            ]);
        if($validators->fails())
            return response()->json($validators->messager(),200);

        $colonium->update($request->all());
        return $colonium;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Colonia  $colonia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Colonia $colonium)
    {
        $request->user()->authorizeRoles(['admin']);
        $colonium->delete();
        return response()->json(["message"=>"ELIMINADO CORRECTAMENTE"],200);
    }
}
