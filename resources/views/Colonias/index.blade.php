@extends('layouts.app')
@section('content')
    <div class="container" v-cloak id="colonias">
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
                <br><h3><strong class="text-white">COLONIAS</strong></h3>
            </div>

            <div class="table-responsive">
                <br>
                <table class="table table-hover-animation table-hover table-bordered mb-0">
                    <thead>
                    <tr>
                        <th class="text-center text-bold-600">COLONIAS</th>
                        <th class="text-center text-bold-600">MUNICIPIO</th>
                        <th class="text-center text-bold-600">CODIGO POSTAL</th>
                        @if(Auth::user()->id_tipo==1)
                            <th class="text-center text-bold-600">Eliminar</th>
                        @endif
                            <th class="text-center text-bold-600">Editar</th>
                    </tr>
                    </thead>
                    <tbody class="text-center justify-content-center">
                    <tr  v-for="col in colonia">
                        <td class="text-bold-600">@{{ col.nombre_colonia }}</td>
                        <td class="text-bold-600 col-auto">@{{ col.get_municipio[0].nombre }}</td>
                        <td class="text-bold-600 col-auto">@{{ col.codigo_postal }}</td>
                        @if(Auth::user()->id_tipo==1)
                            <td class="align-items-center">
                                <button type="button" class="btn col-6 btn-icon btn-outline-danger mr-1 mb-1" data-toggle="tooltip" data-placement="right" title="Eliminar" @click="delColonia(idcolonia=col.id_colonia)">
                                    <i class="feather icon-trash-2"></i>
                                </button>
                            </td>
                        @endif
                        <td>
                            <span data-toggle="modal" data-target="#update_modal">
                                <button type="button" class="btn col-6 btn-icon btn-outline-success mr-1 mb-1" data-toggle="tooltip" data-placement="right" title="Editar" @click="editColonia(col)">
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
            @include("Colonias.partials.delete")
            @include("Colonias.partials.edit")
            @include("Colonias.partials.create")
        @endif
        {{--<pre>
            @{{ $data }}
        </pre>--}}
    </div>
@endsection
@section("scripts")
    <script>
        new Vue({
            el:"#colonias",
            created:function(){
                this.getColonias();
                this.getMunicipios();
            },
            data:{
                api:"{{url("api/colonia")}}/",
                api_muni:"{{url("api/municipio")}}/",
                message:"hola desde vue",
                name:"",
                addname:"",
                addmun:"",
                addcodigo:"",
                editname:"",
                editmun:" ",
                editcodigo:"",
                idcolonia:null,
                colonia:[],
                municipio:[],
            },
            methods:{
                getColonias:function () {
                    axios.get(this.api).then(response=>{
                        this.colonia=response.data;
                    }).catch(error=>{

                    });
                },
                getMunicipios:function () {
                    axios.get(this.api_muni).then(response=>{
                        this.municipio=response.data;
                    }).catch(error=>{

                    });
                },
                delColonia:function (){
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
                            console.log("eliminando colonia..."+this.idcolonia);
                            axios.delete(this.api+this.idcolonia).then(response=>{
                                this.getColonias();
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
                addColonia:function () {
                    console.log("agregando colonia..."+this.addname+this.addmun);
                    axios.post(this.api,{nombre_colonia:this.addname,id_municipio:this.addmun,codigo_postal:this.addcodigo}).then(response=>{
                        this.getColonias();
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
                    this.addmun=[''];
                    this.addcodigo=[''];
                },
                editColonia:function(post){
                    this.editname=post.nombre_colonia;
                    this.editmun=post.id_municipio;
                    this.editcodigo=post.codigo_postal;
                    this.idcolonia=post.id_colonia;
                },
                updateColonia:function(){
                    console.log("editando colonia..."+this.editname+this.editmun);
                    axios.put(this.api+this.idcolonia,{nombre_colonia:this.editname,id_municipio:this.editmun,codigo_postal:this.editcodigo}).then(response=>{
                        this.getColonias();
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
