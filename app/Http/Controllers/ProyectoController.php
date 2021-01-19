<?php

namespace App\Http\Controllers;

use App\Proyecto;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        $proyectos=Proyecto::all();
        $proyectos->load("getTipoProyecto","getColonia","getCompania");
        return $proyectos;
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
                'nombre_proyecto'=> 'required|max:100',
                'descripcion'=> 'required|max:100',
                'id_compania'=>'required',
                'id_tipoproyecto'=>'required',
                'id_colonia'=>'required',
                'fecha'=> 'required|max:100',
                'id_user'=>'required',
            ]);
        if($validators->fails())
            return response()->json($validators->messager(),200);
        $proyecto=array(
            "nombre_proyecto"=>$request->get("nombre_proyecto"),
            "descripcion"=>$request->get("descripcion"),
            "id_compania"=>$request->get("id_compania"),
            "id_tipoproyecto"=>$request->get("id_tipoproyecto"),
            "id_colonia"=>$request->get("id_colonia"),
            "fecha"=>$request->get("fecha"),
            "id_user"=>$request->get("id_user"),
        );
        $proyecto=Proyecto::create($proyecto);
        return $proyecto;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(Proyecto $proyecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        $validators=Validator::make($request->all(),
            [
                'nombre_proyecto'=> 'required|max:100',
                'descripcion'=> 'required|max:100',
                'id_compania'=> 'required|max:100',
                'id_tipoproyecto'=> 'required|max:100',
                'id_colonia'=> 'required|max:100',
                'fecha'=> 'required|max:100',
                'id_user'=> 'required|max:100',
            ]);
        if($validators->fails())
            return response()->json($validators->messager(),200);

        $proyecto->update($request->all());
        return $proyecto;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Proyecto $proyecto)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        $proyecto->delete();
        return response()->json(["message"=>"ELIMINADO CORRECTAMENTE"],200);
    }
}
