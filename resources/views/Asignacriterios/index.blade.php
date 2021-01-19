@extends('layouts.app')
@section('content')
    <div class="container" v-cloak id="asignaciones">
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
                <br><h3><strong class="text-white text-uppercase">Asignación de Criterios</strong></h3>
            </div>

            <div class="table-responsive">
                <br>
                <table class="table table-hover-animation table-hover table-bordered mb-0">
                    <thead>
                    <tr>
                        <th class="text-center text-bold-600 col-auto">Factor</th>
                        <th class="text-center text-bold-600">Criterio</th>
                        @if(Auth::user()->id_tipo==1)
                            <th class="text-center text-bold-600">Eliminar</th>
                            <th class="text-center text-bold-600">Editar</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody class="text-center justify-content-center">
                    <tr  v-for="asi in asigna">
                        <td class="text-bold-600">@{{ asi.get_factores_ambientales[0].nombre_factor}}</td>
                        <td class="text-bold-600">@{{ asi.get_criterio[0].descripcion}}</td>
                        @if(Auth::user()->id_tipo==1)
                            <td class="align-items-center">
                                <button type="button" class="btn col-auto btn-icon btn-outline-danger mr-1 mb-1" data-toggle="tooltip" data-placement="right" title="Eliminar" @click="delAsignacriterio(idasigna=asi.id_asignacriterio)">
                                    <i class="feather icon-trash-2"></i>
                                </button>
                            </td>
                            <td>
                                <span data-toggle="modal" data-target="#update_modal">
                                    <button type="button" class="btn col-auto btn-icon btn-outline-success mr-1 mb-1" data-toggle="tooltip" data-placement="right" title="Editar" @click="editAsignacriterio(asi)">
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
            @include("Asignacriterios.partials.delete")
            @include("Asignacriterios.partials.edit")
            @include("Asignacriterios.partials.create")
        @endif
        {{--<pre>
            @{{ $data }}
        </pre>--}}
    </div>
@endsection
@section("scripts")
    <script>
        new Vue({
            el:"#asignaciones",
            created:function(){
                this.getAsigna();
                this.getFactor();
                this.getCriterio();
            },
            data:{
                api:"{{url("api/asigna")}}/",
                api_factor:"{{url("api/factor")}}/",
                api_criterio:"{{url("api/criterio")}}/",
                message:"hola desde vue",
                name:"",
                addname:"",
                addcri:"",
                editname:"",
                editcri:" ",
                idasigna:null,
                asigna:[],
                factor:[],
                criterio:[],
            },
            methods:{
                getAsigna:function () {
                    axios.get(this.api).then(response=>{
                        this.asigna=response.data;
                    }).catch(error=>{

                    });
                },
                getFactor:function () {
                    axios.get(this.api_factor).then(response=>{
                        this.factor=response.data;
                    }).catch(error=>{

                    });
                },
                getCriterio:function () {
                    axios.get(this.api_criterio).then(response=>{
                        this.criterio=response.data;
                    }).catch(error=>{

                    });
                },
                delAsignacriterio:function (){
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
                            console.log("eliminando variable..."+this.idasigna);
                            axios.delete(this.api+this.idasigna).then(response=>{
                                this.getAsigna();
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
                addAsignacriterio:function () {
                    console.log("agregando var..."+this.addname+this.addcri);
                    axios.post(this.api,{id_factor:this.addname,id_criterio:this.addcri}).then(response=>{
                        this.getAsigna();
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
                    this.addcri=[''];
                },
                editAsignacriterio:function(post){
                    this.editname=post.id_factor;
                    this.editcri=post.id_criterio;
                    this.idasigna=post.id_asignacriterio;
                },
                updateAsignacriterio:function(){
                    console.log("editando var..."+this.editname+this.editcri);
                    axios.put(this.api+this.idasigna,{id_factor:this.editname,id_criterio:this.editcri}).then(response=>{
                        this.getAsigna();
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
