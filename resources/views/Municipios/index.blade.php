@extends('layouts.app')
@section('content')
    <div class="container" v-cloak id="municipios">
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
                <br><h3><strong class="text-white">MUNICIPIOS</strong></h3>
            </div>

            <div class="table-responsive">
                <br>
                <table class="table table-hover-animation table-hover table-bordered mb-0">
                    <thead>
                    <tr>
                        <th class="text-center text-bold-600">MUNICIPIOS</th>
                        <th class="text-center text-bold-600">ESTADO</th>
                        @if(Auth::user()->id_tipo==1)
                            <th class="text-center text-bold-600 col-auto">Eliminar</th>
                        @endif
                            <th class="text-center text-bold-600 col-auto">Editar</th>
                    </tr>
                    </thead>
                    <tbody class="text-center justify-content-center">
                    <tr  v-for="mun in municipio">
                        <td class="text-bold-600">@{{ mun.nombre }}</td>
                        <td class="text-bold-600">@{{ mun.get_estado[0].nombre }}</td>
                        @if(Auth::user()->id_tipo==1)
                            <td class="align-items-center">
                                <button type="button" class="btn col-auto btn-icon btn-outline-danger mr-1 mb-1" data-toggle="tooltip" data-placement="right" title="Eliminar" @click="delPosts(idmunicipio=mun.id_municipio)">
                                    <i class="feather icon-trash-2"></i>
                                </button>
                            </td>
                        @endif
                        <td>
                            <span data-toggle="modal" data-target="#update_modal">
                                <button type="button" class="btn col-auto btn-icon btn-outline-success mr-1 mb-1" data-toggle="tooltip" data-placement="right" title="Editar" @click="editMunicipio(mun)">
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
            @include("Municipios.partials.delete")
            @include("Municipios.partials.edit")
            @include("Municipios.partials.create")
        @endif
        {{--<pre>
            @{{ $data }}
        </pre>--}}
    </div>
@endsection
@section("scripts")
    <script>
        new Vue({
            el:"#municipios",
            created:function(){
                this.getMunicipios();
                this.getEstados();
            },
            data:{
                api:"{{url("api/municipio")}}/",
                api_estado:"{{url("api/estado")}}/",
                message:"hola desde vue",
                name:"",
                addname:"",
                addedo:"",
                editname:"",
                editedo:" ",
                idmunicipio:null,
                municipio:[],
                estado:[],
            },
            methods:{
                getMunicipios:function () {
                    axios.get(this.api).then(response=>{
                        this.municipio=response.data;
                    }).catch(error=>{

                    });
                },
                getEstados:function () {
                    axios.get(this.api_estado).then(response=>{
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
                            axios.delete(this.api+this.idmunicipio).then(response=>{
                                this.getMunicipios();
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
                addMunicipio:function () {
                    console.log("agregando mun..."+this.addname+this.addedo);
                    axios.post(this.api,{nombre:this.addname,id_estado:this.addedo}).then(response=>{
                        this.getMunicipios();
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
                    this.addedo=[''];
                },
                editMunicipio:function(post){
                    this.editname=post.nombre;
                    this.editedo=post.id_estado;
                    this.idmunicipio=post.id_municipio;
                },
                updateMunicipio:function(){
                    console.log("editando mun..."+this.editname+this.editedo);
                    axios.put(this.api+this.idmunicipio,{nombre:this.editname,id_estado:this.editedo}).then(response=>{
                        this.getMunicipios();
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
