@extends('layouts.app')
@section('content')
    <div class="container" v-cloak id="estados">
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
                    <br><h3><strong class="text-white">ESTADOS</strong></h3>
                </div>
                <div class="table-responsive">
                    <br>
                    <table class="table table-hover-animation table-hover table-bordered mb-0">
                        <thead>
                        <tr>
                            <th class="text-center text-bold-600">ESTADO</th>
                            @if(Auth::user()->id_tipo==1)
                                <th class="text-center text-bold-600">Eliminar</th>
                            @endif
                                <th class="text-center text-bold-600">Editar</th>
                        </tr>
                        </thead>
                        <tbody class="text-center justify-content-center">
                        <tr  v-for="edo in estado">
                            <td class="text-bold-600">@{{ edo.nombre }}</td>
                            @if(Auth::user()->id_tipo==1)
                                <td class="align-items-center">
                                    <button type="button" class="btn col-2 btn-icon btn-outline-danger mr-1 mb-1" data-toggle="tooltip" data-placement="right" title="Eliminar" @click="delPosts(idestado=edo.id_estado)">
                                        <i class="feather icon-trash-2"></i>
                                    </button>
                                </td>
                            @endif
                                <td>
                                    <span data-toggle="modal" data-target="#update_modal">
                                        <button type="button" class="btn col-2 btn-icon btn-outline-success mr-1 mb-1" data-toggle="tooltip" data-placement="right" title="Editar" @click="editEstado(edo)">
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
            @include("Estados.partials.deleted")
            @include("Estados.partials.edit")
            @include("Estados.partials.create")
        @endif
            {{--<pre>
                @{{ $data }}
            </pre>--}}
    </div>
@endsection
@section("scripts")
    <script>
        new Vue({
            el:"#estados",
            created:function(){
                this.getEstados();
            },
            data:{
                api:"{{url("api/estado")}}/",
                message:"hola desde vue",
                name:"",
                addname:"",
                editname:"",
                idestado:null,
                estado:[],
            },
            methods:{
                getEstados:function () {
                    axios.get(this.api).then(response=>{
                        this.estado=response.data;
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
                            axios.delete(this.api+this.idestado).then(response=>{
                                this.getEstados();
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
                addEstado:function () {
                    console.log("agregando edo..."+this.addname);
                    axios.post(this.api,{nombre:this.addname}).then(response=>{
                        this.getEstados();
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
                editEstado:function(post){
                    this.editname=post.nombre;
                    this.idestado=post.id_estado;
                },
                updateEstado:function(){
                    console.log("editando edo..."+this.editname);
                    axios.put(this.api+this.idestado,{nombre:this.editname}).then(response=>{
                        this.getEstados();
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
