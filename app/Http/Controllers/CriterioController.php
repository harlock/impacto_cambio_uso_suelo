<?php

namespace App\Http\Controllers;

use App\Criterio;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CriterioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        $criterios=Criterio::all();
        return $criterios;
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
        $request->user()->authorizeRoles(['admin']);
        $validators=Validator::make($request->all(),
            [
                'descripcion'=> 'required|max:100',
            ]);
        if($validators->fails())
            return response()->json($validators->messager(),200);
        $criterio=array(
            "descripcion"=>$request->get("descripcion"),
        );
        $criterio=Criterio::create($criterio);
        return $criterio;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Criterio  $criterio
     * @return \Illuminate\Http\Response
     */
    public function show(Criterio $criterio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Criterio  $criterio
     * @return \Illuminate\Http\Response
     */
    public function edit(Criterio $criterio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Criterio  $criterio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Criterio $criterio)
    {
        $request->user()->authorizeRoles(['admin']);
        $validators=Validator::make($request->all(),
            [
                'descripcion'=>'required',
            ]);
        if($validators->fails())
            return response()->json($validators->messager(),200);

        $criterio->update($request->all());
        return $criterio;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Criterio  $criterio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Criterio $criterio)
    {
        $request->user()->authorizeRoles(['admin']);
        $criterio->delete();
        return response()->json(["message"=>"ELIMINADO CORRECTAMENTE"],200);
    }
}
