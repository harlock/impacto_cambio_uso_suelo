<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\TipoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $users=User::all();
        $users->load("getTipoUsuario");
        return $users;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $validators=Validator::make($request->all(),
            [
                'name'=>'required',
                'apusuario'=>'required',
                'amusuario'=>'required',
                'email'=>'required',
                'password'=>'required',
                'id_tipo'=>'required',
            ]);
        if ($validators->fails())
            return response()->json($validators->messages(),200);
        $user = User::create([
            'name' => $request['name'],
            'apusuario'=> $request['apusuario'],
            'amusuario'=> $request['amusuario'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'id_tipo'=>2,
            'api_token'=> Str::random(80),
        ]);
        $user->roles()->attach(Role::where('name', 'user')->first());
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->user()->authorizeRoles(['admin']);
        $validators=Validator::make($request->all(),
            [
                'name'=>'required',
                'apusuario'=>'required',
                'amusuario'=>'required',
                'email'=>'required',
                /*'password'=>'required|min:8',*/
                'id_tipo'=>'required',
            ]);
        if ($validators->fails())
            return response()->json($validators->messages(),200);
        $user->name=$request->name;
        $user->apusuario=$request->apusuario;
        $user->amusuario=$request->amusuario;
        $user->email=$request->email;
        /*$user->password=$request->get("password");*/
        $user->id_tipo=$request->id_tipo;
        $user-> save();
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,User $user)
    {
        $request->user()->authorizeRoles(['admin']);
        $user->delete();
        return response()->json(["status"=>"El registro se elimino con exito"],200);
    }
}
