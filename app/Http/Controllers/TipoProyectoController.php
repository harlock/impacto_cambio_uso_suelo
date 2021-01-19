<?php

namespace App\Http\Controllers;

use App\TipoProyecto;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class TipoProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        $tipo=TipoProyecto::all();
        return $tipo;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Tipoproyecto.create");
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
            ]);
        if($validators->fails())
            return response()->json($validators->messager(),200);
        $tipo=array(
            "nombre_proyecto"=>$request->get("nombre_proyecto"),
        );
        $tipo=TipoProyecto::create($tipo);
        return $tipo;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoProyecto  $tipoProyecto
     * @return \Illuminate\Http\Response
     */
    public function show(TipoProyecto $tipoProyecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoProyecto  $tipoProyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoProyecto $tipo)
    {
        return view("Tipoproyecto.update",compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoProyecto  $tipoProyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoProyecto $tipo)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        $validators=Validator::make($request->all(),
            [
                'nombre_proyecto'=> 'required|max:100',
            ]);
        if($validators->fails())
            return response()->json($validators->messager(),200);

        $tipo->update($request->all());
        return $tipo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoProyecto  $tipoProyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,TipoProyecto $tipo)
    {
        $request->user()->authorizeRoles(['admin']);
        $tipo->delete();
        return response()->json(["message"=>"ELIMINADO CORRECTAMENTE"],200);
    }
}
