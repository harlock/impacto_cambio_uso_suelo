<?php

namespace App\Http\Controllers;

use App\Compania;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompaniaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        $companias=Compania::all();
        return $companias;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Compañias.create");
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
                'nombre_compania'=> 'required|max:100',
            ]);
        if($validators->fails())
            return response()->json($validators->messager(),200);
        $compania=array(
            "nombre_compania"=>$request->get("nombre_compania"),
        );
        $compania=Compania::create($compania);
        return $compania;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estado  $compania
     * @return \Illuminate\Http\Response
     */
    public function show(Compania $compania)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Compania  $compania
     * @return \Illuminate\Http\Response
     */
    public function edit(Compania $compania)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Compania  $companium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compania $companium)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        $validators=Validator::make($request->all(),
            [
                'nombre_compania'=> 'required|max:100',
            ]);
        if($validators->fails())
            return response()->json($validators->messager(),200);

        $companium->update($request->all());
        return $companium;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Compania  $companium
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Compania $companium)
    {
        $request->user()->authorizeRoles(['admin']);
        $companium->delete();
        return response()->json(["message"=>"ELIMINADO CORRECTAMENTE"],200);
    }
}
