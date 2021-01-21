@extends('layouts.app')
@section('content')
    <div class="container" v-cloak id="Companias">
        <div class="row justify-content-md-center">
            <div class="col">
                <a class="btn bg-gradient-dark btn-success" href="{{url("proyectos")}}"><i class="fa fa-arrow-left text-white"></i> <strong class="text-white">Regresar</strong></a>
            </div>
            <div class="col text-right">
                <button type="button" class="btn bg-gradient-dark btn-success" data-toggle="modal"
                        data-target="#exampleModalCenter">
                    <i class="fa fa-plus text-white"></i> <strong class="text-white">Nuevo</strong>
                </button>
            </div>
        </div>
        <BR/>
        <div class="row card">
            <div class="text-center card-header justify-content-center bg-secondary">
                <br><h3><strong class="text-white">COMPAÑÍAS</strong></h3>
            </div>

            <div class="table-responsive">
                <br>
                <table class="table table-hover-animation table-hover table-bordered mb-0">
                    <thead>
                    <tr>
                        <th class="text-center text-bold-600">COMPAÑÍA</th>
                        @if(Auth::user()->id_tipo==1)
                            <th class="text-center text-bold-600">Eliminar</th>
                        @endif
                            <th class="text-center text-bold-600">Editar</th>
                    </tr>
                    </thead>
                    <tbody class="text-center justify-content-center">
                    <tr class="text-center" v-for="com in compania">
                        <td class="text-bold-600">@{{ com.nombre_compania }}</td>
                        @if(Auth::user()->id_tipo==1)
                            <td class="align-items-center">
                                <button type="button" class="btn col-2 btn-icon btn-outline-danger mr-1 mb-1" data-toggle="tooltip" data-placement="right" title="Eliminar" @click="delPosts(idcompania=com.id_compania)">
                                    <i class="feather icon-trash-2"></i>
                                </button>
                            </td>
                        @endif
                            <td>
                                <span data-toggle="modal" data-target="#update_modal">
                                    <button type="button" class="btn col-2 btn-icon btn-outline-success mr-1 mb-1" data-toggle="tooltip" data-placement="right" title="Editar" @click="editCompania(com)">
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
            @include("Compañias.partials.edit")
            @include("Compañias.partials.create")
        @endif
        {{--<pre>
            @{{ $data }}
        </pre>--}}
    </div>
@endsection
@section("scripts")
    <script>
        new Vue({
            el:"#Companias",
            created:function(){
                this.getCompania();
            },
            data:{
                api:"{{url("api/compania")}}/",
                message:"hola desde vue",
                name:"",
                addname:"",
                editname:"",
                idcompania:null,
                compania:[],
            },
            methods:{
                getCompania:function () {
                    axios.get(this.api).then(response=>{
                        this.compania=response.data;
                    }).catch(error=>{

                    });
                },
                delPosts:function (){
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
                            console.log("eliminando compania..."+this.idcompania);
                            axios.delete(this.api+this.idcompania).then(response=>{
                                this.getCompania();
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
                addCompania:function () {
                    console.log("agregando compania..."+this.addname);
                    axios.post(this.api,{nombre_compania:this.addname}).then(response=>{
                        this.getCompania();
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
                },
                editCompania:function(post){
                    this.editname=post.nombre_compania;
                    this.idcompania=post.id_compania;
                },
                updateCompania:function(){
                    console.log("editando compania..."+this.editname);
                    axios.put(this.api+this.idcompania,{nombre_compania:this.editname}).then(response=>{
                        this.getCompania();
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
