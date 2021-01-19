@extends('layouts.app')
@section('content')
    <div class="container" v-cloak id="tipos">
        <div class="row justify-content-md-center">
            <div class="col">
                <a class="btn bg-gradient-dark btn-success" href="{{url("proyectos")}}"><i class="fa fa-arrow-left text-white"></i> <strong class="text-white">Regresar</strong></a>
            </div>
            <div class="col text-right">
                <a class="btn bg-gradient-dark btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="fa fa-plus text-white"></i> <strong class="text-white">Nuevo</strong>
                </a>
            </div>
        </div>
        <BR/>
        <div class="row card">
            <div class="text-center card-header justify-content-center bg-secondary">
                <br><h3><strong class="text-white text-uppercase">Tipos de Proyectos</strong></h3>
            </div>

            <div class="table-responsive">
                <br>
                <table class="table table-hover-animation table-hover table-bordered mb-0">
                    <thead>
                    <tr>
                        <th class="text-center text-bold-600">Tipo de Proyecto</th>
                        @if(Auth::user()->id_tipo==1)
                            <th class="text-center text-bold-600">Eliminar</th>
                        @endif
                            <th class="text-center text-bold-600">Editar</th>
                    </tr>
                    </thead>
                    <tbody class="text-center justify-content-center">
                    <tr  v-for="tip in tipo">
                        <td class="text-bold-600">@{{ tip.nombre_proyecto }}</td>
                        @if(Auth::user()->id_tipo==1)
                            <td class="align-items-center">
                                <button type="button" class="btn col-2 btn-icon btn-outline-danger mr-1 mb-1" data-toggle="tooltip" data-placement="right" title="Eliminar" @click="delTipo(idtipo=tip.id_tipoproyecto)">
                                    <i class="feather icon-trash-2"></i>
                                </button>
                            </td>
                        @endif
                            <td>
                                <span data-toggle="modal" data-target="#update_modal">
                                    <button type="button" class="btn col-2 btn-icon btn-outline-success mr-1 mb-1" data-toggle="tooltip" data-placement="right" title="Editar" @click="editTipo(tip)">
                                        <i class="feather icon-edit-1"></i>
                                    </button>
                                </span>
                            </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @if(Auth::check())
            @include("TipoProyectos.partials.delete")
            @include("TipoProyectos.partials.edit")
            @include("TipoProyectos.partials.create")
        @endif
        {{--<pre>
            @{{ $data }}
        </pre>--}}
    </div>
@endsection
@section("scripts")
    <script>
        new Vue({
            el:"#tipos",
            created:function(){
                this.getTipoproyecto();
            },
            data:{
                api:"{{url("api/tipo")}}/",
                message:"hola desde vue",
                name:"",
                addname:"",
                editname:"",
                idtipo:null,
                tipo:[],
            },
            methods:{
                getTipoproyecto:function () {
                    axios.get(this.api).then(response=>{
                        this.tipo=response.data;
                    }).catch(error=>{

                    });
                },
                delTipo:function (){
                    Swal.fire({
                        title: '¿Está seguro que desea eliminar?',
                        text: "No volveras a usar este dato!",
                        type: 'warning',
                        showCancelButton: true,
                        cancelButtonColor: '#160909',
                        confirmButtonColor: '#d33',
                        cancelButtonText: 'Cancelar',
                        confirmButtonText: 'Eliminar',
                    }).then((result) =>  {
                        if(result.value){
                            console.log("eliminando tipo..."+this.idtipo);
                            axios.delete(this.api+this.idtipo).then(response=>{
                                this.getTipoproyecto();
                                Swal.fire({
                                    title: 'Eliminado!',
                                    text: 'Eliminado correctamente',
                                    type: 'success',
                                    confirmButtonColor: '#3f8a29',
                                    confirmButtonText: 'Aceptar'
                                });
                            }).catch(error=>{
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Acción no autorizada',
                                    type: 'error',
                                    confirmButtonText: 'Aceptar'
                                });
                                console.log(error);
                            });
                        }
                    })
                },
                addTipo:function () {
                    console.log("agregando tipo..."+this.addname);
                    axios.post(this.api,{nombre_proyecto:this.addname}).then(response=>{
                        this.getTipoproyecto();
                        Swal.fire({
                            title: 'Guardado Correctamente',
                            type: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }).catch(error=>{
                        Swal.fire({
                            title: 'Error!',
                            text: 'Debe Ingresar Algún Valor',
                            type: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                    });
                    this.addname=[''];
                },
                editTipo:function(post){
                    this.editname=post.nombre_proyecto;
                    this.idtipo=post.id_tipoproyecto;
                },
                updateTipo:function(){
                    console.log("editando tipo..."+this.editname);
                    axios.put(this.api+this.idtipo,{nombre_proyecto:this.editname}).then(response=>{
                        this.getTipoproyecto();
                        Swal.fire({
                            title: 'Editado Correctamente',
                            type: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    });
                },
            },
        });
    </script>
@endsection
