@extends('layouts.app')
@section('content')
    <div class="container" v-cloak id="etapas">
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
                <br><h3><strong class="text-white">ETAPAS</strong></h3>
            </div>

            <div class="table-responsive">
                <br>
                <table class="table table-hover-animation table-hover table-bordered mb-0">
                    <thead>
                    <tr>
                        <th class="text-center text-bold-600">Etapa</th>
                        @if(Auth::user()->id_tipo==1)
                            <th class="text-center text-bold-600">Eliminar</th>
                            <th class="text-center text-bold-600">Editar</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody class="text-center justify-content-center">
                    <tr v-for="eta in etapa">
                        <td class="text-bold-600">@{{ eta.etapa }}</td>
                        @if(Auth::user()->id_tipo==1)
                            <td class="align-items-center">
                                <button type="button" class="btn col-2 btn-icon btn-outline-danger mr-1 mb-1" data-toggle="tooltip" data-placement="right" title="Eliminar" @click="delEtapa(idetapa=eta.id_etapa)">
                                    <i class="feather icon-trash-2"></i>
                                </button>
                            </td>
                            <td>
                                <span data-toggle="modal" data-target="#update_modal">
                                    <button type="button" class="btn col-2 btn-icon btn-outline-success mr-1 mb-1" data-toggle="tooltip" data-placement="right" title="Editar" @click="editEtapa(eta)">
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
            @include("Etapas.partials.delete")
            @include("Etapas.partials.edit")
            @include("Etapas.partials.create")
        @endif
        {{--<pre>
            @{{ $data }}
        </pre>--}}
    </div>
@endsection
@section("scripts")
    <script>
        new Vue({
            el:"#etapas",
            created:function(){
                this.getEtapa();
            },
            data:{
                api:"{{url("api/etapa")}}/",
                message:"hola desde vue",
                name:"",
                addname:"",
                editname:"",
                idetapa:null,
                etapa:[],
            },
            methods:{
                getEtapa:function () {
                    axios.get(this.api).then(response=>{
                        this.etapa=response.data;
                    }).catch(error=>{

                    });
                },
                delEtapa:function (){
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
                            console.log("eliminando etapa..."+this.idetapa);
                            axios.delete(this.api+this.idetapa).then(response=>{
                                this.getEtapa();
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
                addEtapa:function () {
                    console.log("agregando etapa..."+this.addname);
                    axios.post(this.api,{etapa:this.addname}).then(response=>{
                        this.getEtapa();
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
                editEtapa:function(post){
                    this.editname=post.etapa;
                    this.idetapa=post.id_etapa;
                },
                updateEtapa:function(){
                    console.log("editando etapa..."+this.editname);
                    axios.put(this.api+this.idetapa,{etapa:this.editname}).then(response=>{
                        this.getEtapa();
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
