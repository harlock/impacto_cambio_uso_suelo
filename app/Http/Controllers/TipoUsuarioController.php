<?php

namespace App\Http\Controllers;

use App\TipoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TipoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposusuarios=TipoUsuario::all();
        return $tiposusuarios;
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
        $validators=Validator::make($request->all(),
            [
                'descripcion'=> 'required|max:100',
            ]);
        if($validators->fails())
            return response()->json($validators->messager(),200);
        $tipuser=array(
            "descripcion"=>$request->get("descripcion"),
        );
        $tipuser=TipoUsuario::create($tipuser);
        return $tipuser;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $tipuser
     * @return \Illuminate\Http\Response
     */
    public function show($tipuser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $tipuser
     * @return \Illuminate\Http\Response
     */
    public function edit($tipuser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $tipuser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoUsuario $tipuser)
    {
        $validators=Validator::make($request->all(),
            [
                'descripcion'=> 'required|max:100',
            ]);
        if($validators->fails())
            return response()->json($validators->messager(),200);

        $tipuser->update($request->all());
        return $tipuser;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $tipuser
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoUsuario $tipuser)
    {
        $tipuser->delete();
        return response()->json(["message"=>"ELIMINADO CORRECTAMENTE"],200);
    }
}
