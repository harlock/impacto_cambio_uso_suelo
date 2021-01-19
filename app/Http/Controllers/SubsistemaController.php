<?php

namespace App\Http\Controllers;

use App\Subsistema;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SubsistemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        $subsistema=Subsistema::all();
        return $subsistema;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Subsistemas.create");
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
                'nombre_subsistema'=> 'required|max:100',
            ]);
        if($validators->fails())
            return response()->json($validators->messager(),200);
        $subsistema=array(
            "nombre_subsistema"=>$request->get("nombre_subsistema"),
        );
        $subsistema=Subsistema::create($subsistema);
        return $subsistema;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subsistema  $subsistema
     * @return \Illuminate\Http\Response
     */
    public function show(Subsistema $subsistema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subsistema  $subsistema
     * @return \Illuminate\Http\Response
     */
    public function edit(Subsistema $subsistema)
    {
        return view("Subsistemas.update",compact('subsistema'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subsistema  $subsistema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subsistema $subsistema)
    {
        $request->user()->authorizeRoles(['admin']);
        $validators=Validator::make($request->all(),
            [
                'nombre_subsistema'=> 'required|max:100',
            ]);
        if($validators->fails())
            return response()->json($validators->messager(),200);

        $subsistema->update($request->all());
        return $subsistema;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subsistema  $subsistema
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Subsistema $subsistema)
    {
        $request->user()->authorizeRoles(['admin']);
        $subsistema->delete();
        return response()->json(["message"=>"ELIMINADO CORRECTAMENTE"],200);
    }
}
