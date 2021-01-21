@extends('layouts.app')
@section('content')
    <div class="container" v-cloak id="variables">
        <div class="row justify-content-md-center">
            <div class="col">
                <a class="btn bg-gradient-dark btn-success" href="{{url("proyectos")}}"><i class="fa fa-arrow-left text-white"></i> <strong class="text-white">Regresar</strong></a>
            </div>
            @if(Auth::user()->id_tipo==1)
                <div class="col text-right">
                    <a class="btn bg-gradient-dark btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="fa fa-plus text-white"></i> <strong class="text-white">Nuevo</strong>
                    </a>
                </div>
            @endif
        </div>
        <BR/>
        <div class="row card">
            <div class="text-center card-header justify-content-center bg-secondary">
                <br><h3><strong class="text-white">VARIABLES</strong></h3>
            </div>

            <div class="table-responsive">
                <br>
                <table class="table table-hover-animation table-hover table-bordered mb-0">
                    <thead>
                    <tr>
                        <th class="text-center text-bold-600">VARIABLES</th>
                        <th class="text-center text-bold-600">SUBSISTEMAS</th>
                        @if(Auth::user()->id_tipo==1)
                            <th class="text-center text-bold-600">Eliminar</th>
                            <th class="text-center text-bold-600">Editar</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody class="text-center justify-content-center">
                    <tr  v-for="vari in variable">
                        <td class="text-bold-600">@{{ vari.nombre_variable }}</td>
                        <td class="text-bold-600">@{{ vari.get_subsistema[0].nombre_subsistema  }}</td>
                        @if(Auth::user()->id_tipo==1)
                            <td class="align-items-center">
                                <button type="button" class="btn col-4 btn-icon btn-outline-danger mr-1 mb-1" data-toggle="tooltip" data-placement="right" title="Eliminar" @click="delVariable(idvariable=vari.id_variable)">
                                    <i class="feather icon-trash-2"></i>
                                </button>
                            </td>
                            <td>
                                <span data-toggle="modal" data-target="#update_modal">
                                    <button type="button" class="btn col-4 btn-icon btn-outline-success mr-1 mb-1" data-toggle="tooltip" data-placement="right" title="Editar" @click="editVariable(vari)">
                                        <i class="feather icon-edit-1"></i>
                                    </button>
                                </span>
                            </td>
                        @endif
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @if(Auth::check())
            @include("Variables.partials.delete")
            @include("Variables.partials.edit")
            @include("Variables.partials.create")
        @endif
        {{--<pre>
            @{{ $data }}
        </pre>--}}
    </div>
@endsection
@section("scripts")
    <script>
        new Vue({
            el:"#variables",
            created:function(){
                this.getVariables();
                this.getSubsistema();
            },
            data:{
                api:"{{url("api/variable")}}/",
                api_sub:"{{url("api/subsistema")}}/",
                message:"hola desde vue",
                name:"",
                addname:"",
                addsub:"",
                editname:"",
                editsub:" ",
                idvariable:null,
                variable:[],
                subsistema:[],
            },
            methods:{
                getVariables:function () {
                    axios.get(this.api).then(response=>{
                        this.variable=response.data;
                    }).catch(error=>{

                    });
                },
                getSubsistema:function () {
                    axios.get(this.api_sub).then(response=>{
                        this.subsistema=response.data;
                    }).catch(error=>{

                    });
                },
                delVariable:function (){
                    Swal.fire({
                        title: '¿Está seguro que desea eliminar?',
                        text: "¡No volveras a usar este dato!",
                        type: 'warning',
                        showCancelButton: true,
                        cancelButtonColor: '#160909',
                        confirmButtonColor: '#d33',
                        cancelButtonText: 'Cancelar',
                        confirmButtonText: 'Eliminar',
                    }).then((result) =>  {
                        if(result.value){
                            console.log("eliminando variable..."+this.idvariable);
                            axios.delete(this.api+this.idvariable).then(response=>{
                                this.getVariables();
                                Swal.fire({
                                    title: '¡Eliminado!',
                                    text: 'Eliminado correctamente',
                                    type: 'success',
                                    confirmButtonColor: '#3f8a29',
                                    confirmButtonText: 'Aceptar'
                                });
                            }).catch(error=>{
                                Swal.fire({
                                    title: '¡Error!',
                                    text: 'Acción no autorizada',
                                    type: 'error',
                                    confirmButtonText: 'Aceptar'
                                });
                                console.log(error);
                            });
                        }
                    })
                },
                addVariable:function () {
                    console.log("agregando var..."+this.addname+this.addsub);
                    axios.post(this.api,{nombre_variable:this.addname,id_subsistema:this.addsub}).then(response=>{
                        this.getVariables();
                        Swal.fire({
                            title: 'Guardado Correctamente',
                            type: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }).catch(error=>{
                        Swal.fire({
                            title: '¡Error!',
                            text: 'Debe Ingresar Algún Valor',
                            type: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                    });
                    this.addname=[''];
                    this.addsub=[''];
                },
                editVariable:function(post){
                    this.editname=post.nombre_variable;
                    this.editsub=post.id_subsistema;
                    this.idvariable=post.id_variable;
                },
                updateVariable:function(){
                    console.log("editando var..."+this.editname+this.editsub);
                    axios.put(this.api+this.idvariable,{nombre_variable:this.editname,id_subsistema:this.editsub}).then(response=>{
                        this.getVariables();
                        Swal.fire({
                            title: 'Editado Correctamente',
                            type: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    })
                },
            },
        });
    </script>
@endsection
