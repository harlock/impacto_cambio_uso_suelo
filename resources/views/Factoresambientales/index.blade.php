@extends('layouts.app')
@section('content')
    <div class="container" v-cloak id="factores">
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
                <br><h3><strong class="text-white">FACTORES AMBIENTALES</strong></h3>
            </div>

            <div class="table-responsive">
                <br>
                <table class="table table-hover-animation table-hover table-bordered mb-0">
                    <thead>
                    <tr>
                        <th class="text-center text-bold-600">Factor Ambiental</th>
                        <th class="text-center text-bold-600">Variable</th>
                        @if(Auth::user()->id_tipo==1)
                            <th class="text-center text-bold-600">Eliminar</th>
                            <th class="text-center text-bold-600">Editar</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody class="text-center justify-content-center">
                    <tr  v-for="fa in factor">
                        <td class="text-bold-600 col-auto">@{{ fa.nombre_factor}}</td>
                        <td class="text-bold-600 col-auto">@{{ fa.get_variable[0].nombre_variable}}</td>
                        @if(Auth::user()->id_tipo==1)
                            <td class="align-items-center">
                                {{--<button type="button" class="btn col-4 btn-icon btn-outline-danger mr-1 mb-1" @click="delFactor(idfactor=fa.id_factor)">
                                    <i class="ficon feather icon-trash-2"></i>
                                </button>--}}
                                <button type="button" class="btn col-auto btn-icon btn-outline-danger mr-1 mb-1" data-toggle="tooltip" data-placement="right" title="Eliminar" @click="delFactor(idfactor=fa.id_factor)">
                                    <i class="feather icon-trash-2"></i>
                                </button>
                            </td>
                            <td>
                                {{--<button type="button" class="btn col-4 btn-icon btn-outline-success mr-1 mb-1" data-toggle="modal" data-target="#update_modal" @click="editFactor(fa)">
                                    <i class="ficon feather icon-edit-1"></i>
                                </button>--}}
                                <span data-toggle="modal" data-target="#update_modal">
                                    <button type="button" class="btn col-auto btn-icon btn-outline-success mr-1 mb-1" data-toggle="tooltip" data-placement="right" title="Editar" @click="editFactor(fa)">
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
            @include("Factoresambientales.partials.delete")
            @include("Factoresambientales.partials.edit")
            @include("Factoresambientales.partials.create")
        @endif
        {{--<pre>
            @{{ $data }}
        </pre>--}}
    </div>
@endsection
@section("scripts")
    <script>
        new Vue({
            el:"#factores",
            created:function(){
                this.getFactores();
                this.getVariables();
            },
            data:{
                api:"{{url("api/factor")}}/",
                api_variable:"{{url("api/variable")}}/",
                message:"hola desde vue",
                name:"",
                addname:"",
                addvar:"",
                editname:"",
                editvar:" ",
                idfactor:null,
                factor:[],
                variable:[],
            },
            methods:{
                getFactores:function () {
                    axios.get(this.api).then(response=>{
                        this.factor=response.data;
                    }).catch(error=>{

                    });
                },
                getVariables:function () {
                    axios.get(this.api_variable).then(response=>{
                        this.variable=response.data;
                    }).catch(error=>{

                    });
                },
                delFactor:function (){
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
                            console.log("eliminando FactorAmbiental..."+this.idfactor);
                            axios.delete(this.api+this.idfactor).then(response=>{
                                this.getFactores();
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
                addFactor:function () {
                    console.log("agregando fac..."+this.addname+this.addvar);
                    axios.post(this.api,{nombre_factor:this.addname,id_variable:this.addvar}).then(response=>{
                        this.getFactores();
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
                    this.addvar=[''];
                },
                editFactor:function(post){
                    this.editname=post.nombre_factor;
                    this.editvar=post.id_variable;
                    this.idfactor=post.id_factor;
                },
                updateFactor:function(){
                    console.log("editando fac..."+this.editname+this.editvar);
                    axios.put(this.api+this.idfactor,{nombre_factor:this.editname,id_variable:this.editvar}).then(response=>{
                        this.getFactores();
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
