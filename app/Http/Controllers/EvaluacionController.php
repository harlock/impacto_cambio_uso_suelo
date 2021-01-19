<?php

namespace App\Http\Controllers;

use App\Evaluacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        $evaluaciones = Evaluacion::all();
        $evaluaciones->load("getAsignaCriterio", "getEtapa", "getProyecto");
        return $evaluaciones;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        $countarray = array_sum(array_count_values($request->valores));
        if ($countarray < 48) {
            return response()->json('error debe de ingresar todos los datos', 500);
        } else {
            $validators = Validator::make($request->all(),
                [
                    'factor' => 'required',
                    'valores' => 'required',
                ]);
            if ($validators->fails()) {
                return response()->json($validators->messager('error ingrese todos los datos'), 500);
            }
        }
        foreach ($request->valores as $key => $valor) {
            $datos = explode("@", $key);
            switch ($datos[0]) {
                case "preparacion":
                    $idetapa = 1;
                    break;
                case "construccion":
                    $idetapa = 2;
                    break;
                case "mantenimiento":
                    $idetapa = 3;
                    break;
                case "abandono":
                    $idetapa = 4;
                    break;
            }
            $test = Evaluacion::where(['id_asignacriterio' => $datos[1],
                'id_etapa' => $idetapa,
                'id_proyecto' => $id]);
            if ($test->count() == 1)
                $test->update(['valor' => $valor]);
            else {
                $evaluacion = array(
                    "id_asignacriterio" => $datos[1],
                    "id_etapa" => $idetapa,
                    "id_proyecto" => $id,
                    "valor" => $valor,
                );
                $evaluacion = Evaluacion::create($evaluacion);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Evaluacion $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluacion $evaluacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Evaluacion $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Evaluacion $evaluacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Evaluacion $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evaluacion $evaluacion)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        $validators = Validator::make($request->all(),
            [
                'id_asignacriterio' => 'required|max:100',
                'id_etapa' => 'required|max:100',
                'id_proyecto' => 'required|max:100',
                'valor' => 'required|max:100',
            ]);
        if ($validators->fails())
            return response()->json($validators->messager(), 200);

        $evaluacion->update($request->all());
        return $evaluacion;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Evaluacion $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Evaluacion $evaluacion)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        $evaluacion->delete();
        return response()->json(["message" => "ELIMINADO CORRECTAMENTE"], 200);
    }
}
