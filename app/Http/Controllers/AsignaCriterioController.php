<?php

namespace App\Http\Controllers;

use App\AsignaCriterio;
use App\Evaluacion;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class AsignaCriterioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        $asignaciones=AsignaCriterio::all();
        $asignaciones->load("getFactoresAmbientales","getCriterio");
        return $asignaciones;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("AsignaCriterios.create");
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
                'id_factor'=>'required',
                'id_criterio'=>'required',
            ]);
        if($validators->fails())
            return response()->json($validators->messager(),200);
        $asigna=array(
            "id_factor"=>$request->get("id_factor"),
            "id_criterio"=>$request->get("id_criterio")
        );
        $asigna=AsignaCriterio::create($asigna);
        return $asigna;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AsignaCriterio  $asigna
     * @return \Illuminate\Http\Response
     */
    public function show($proyecto,$asigna )
    {
        $criterios=AsignaCriterio::whereIdFactor($asigna)->get()->load("getCriterio");

        $idcriterios=$criterios->pluck('id_asignacriterio');

        $evaluacion=Evaluacion::where("id_proyecto",$proyecto)->whereIn('id_asignacriterio',$idcriterios)->get();
        $datos=array(
            "criterios"=>$criterios->all(),
            "evaluacion"=>$evaluacion,
        );
        return ($datos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AsignaCriterio  $asigna
     * @return \Illuminate\Http\Response
     */
    public function edit(AsignaCriterio $asigna)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AsignaCriterio  $asigna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AsignaCriterio $asigna)
    {
        $request->user()->authorizeRoles(['admin']);
        $validators=Validator::make($request->all(),
            [
                'id_factor'=> 'required|max:100',
                'id_criterio'=> 'required|max:100',
            ]);
        if($validators->fails())
            return response()->json($validators->messager(),200);

        $asigna->update($request->all());
        return $asigna;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AsignaCriterio  $asigna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,AsignaCriterio $asigna)
    {
        $request->user()->authorizeRoles(['admin']);
        $asigna->delete();
        return response()->json(["message"=>"ELIMINADO CORRECTAMENTE"],200);
    }
}
