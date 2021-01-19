<?php

namespace App\Http\Controllers;

use App\Variable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VariableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        $variables=Variable::all();
        $variables->load("getSubsistema");
        return $variables;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Variables.create");
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
                'nombre_variable'=> 'required|max:100',
                'id_subsistema'=>'required',
            ]);
        if($validators->fails())
            return response()->json($validators->messager(),200);
        $variable=array(
            "nombre_variable"=>$request->get("nombre_variable"),
            "id_subsistema"=>$request->get("id_subsistema")
        );
        $variable=Variable::create($variable);
        return $variable;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Variable  $variable
     * @return \Illuminate\Http\Response
     */
    public function show(Variable $variable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Variable  $variable
     * @return \Illuminate\Http\Response
     */
    public function edit(Variable $variable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Variable  $variable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Variable $variable)
    {
        $request->user()->authorizeRoles(['admin']);
        $validators=Validator::make($request->all(),
            [
                'nombre_variable'=> 'required|max:100',
                'id_subsistema'=> 'required|max:100',
            ]);
        if($validators->fails())
            return response()->json($validators->messager(),200);

        $variable->update($request->all());
        return $variable;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Variable  $variable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Variable $variable)
    {
        $request->user()->authorizeRoles(['admin']);
        $variable->delete();
        return response()->json(["message"=>"ELIMINADO CORRECTAMENTE"],200);
    }
}
