@extends('layouts.app')
@section('content')
    <div class="container" id="proyectos">
        <div class="row text-center">
            <div class="col-10 text-center">
                <h3><strong class="text-dark text-center">PROYECTOS</strong></h3>
            </div>
            <div class="col text-right mb-4">
                <a class="btn bg-gradient-dark btn-success" data-toggle="modal" data-target="#exampleModalCenter" @click="selectuser({{Auth::user()->id_user}})">
                    <i class="fa fa-plus text-white"></i> <strong class="text-white">Nuevo</strong>
                </a>
            </div>
        </div>
        <section id="timeline-card" v-cloak>
            <div class="col-lg-6 col-sm-12">
                <div class="card" v-for="pro in proyecto" v-if="pro.id_user=={{Auth::check() ? Auth::id():"null"}}">
                    <div class="card-header justify-content-center">
                        <h4 class="card-title text-uppercase">@{{ pro.nombre_proyecto }}</h4>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a @click="delProyecto(idproyecto=pro.id_proyecto)"><i class="danger text-bold-700 feather icon-x" data-toggle="tooltip" data-placement="top" title="Eliminar"></i></a></li>
                                <span data-toggle="modal" data-target="#update_modal">
                                    <li><a data-toggle="tooltip" data-placement="top" title="Editar" @click="editProyecto(pro,{{Auth::user()->id_user}})"><i class="warning text-bold-700 feather icon-edit-1"></i></a></li>
                                </span>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content col">
                        <div class="card-body">
                            <ul class="activity-timeline timeline-left list-unstyled">
                                <li>
                                    <div class="timeline-icon bg-primary">
                                        <i class="feather icon-align-justify font-medium-2"></i>
                                    </div>
                                    <div class="timeline-info">
                                        <p class="font-weight-bold">Descripción</p>
                                        <span>@{{ pro.descripcion }}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-icon bg-vimeo">
                                        <i class="feather icon-shield font-medium-2"></i>
                                    </div>
                                    <div class="timeline-info">
                                        <p class="font-weight-bold">Comañía</p>
                                        <span><td>@{{ pro.get_compania[0].nombre_compania }}</td></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-icon bg-microsoft">
                                        <i class="feather icon-clipboard font-medium-2"></i>
                                    </div>
                                    <div class="timeline-info">
                                        <p class="font-weight-bold">Tipo de proyecto</p>
                                        <span>@{{ pro.get_tipo_proyecto[0].nombre_proyecto }}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-icon bg-success">
                                        <i class="feather icon-map-pin font-medium-2"></i>
                                    </div>
                                    <div class="timeline-info">
                                        <p class="font-weight-bold">Colonia</p>
                                        <span>@{{ pro.get_colonia[0].nombre_colonia }}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-icon bg-google">
                                        <i class="feather icon-calendar font-medium-2"></i>
                                    </div>
                                    <div class="timeline-info">
                                        <p class="font-weight-bold">Fecha</p>
                                        <span>@{{ pro.fecha }}</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col text-center mb-4">
                        <a type="button" class="btn btn-icon btn-outline-success" v-bind:href="'{{url("evaluacion")}}/'+pro.id_proyecto">
                            Realizar Evaluación <i class="ficon feather icon-plus text-bold-700"></i>
                        </a>
                        <a type="button" class="btn btn-icon btn-outline-success ml-3" v-bind:href="'{{url("total")}}/'+pro.id_proyecto">
                            Resultados de la Evaluación <i class="ficon feather icon-bar-chart-2 text-bold-700"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        @if(Auth::check())
            @include("Proyectos.partials.delete")
            @include("Proyectos.partials.edit")
            @include("Proyectos.partials.create")
        @endif
        {{--<pre>
            @{{ $data }}
        </pre>--}}
    </div>
@endsection
@section("scripts")
    <script>
        new Vue({
            el:"#proyectos",
            created:function(){
                this.getProyectos();
                this.getColonias();
                this.getTipos();
                this.getCompania();
            },
            mounted() {
                var self=this;
                $('#fecha_registro').pickadate({
                    format:"yyyy-mm-dd",
                    onSet: function(context) {
                        self.addfec=this.get();
                    }
                });
                $('#fecha_edicion').pickadate({
                    format:"yyyy-mm-dd",
                    onSet: function(context) {
                        self.editfec=this.get();
                    }
                });
            },
            data:{
                api:"{{url("api/proyecto")}}/",
                api_colonia:"{{url("api/colonia")}}/",
                api_tipo:"{{url("api/tipo")}}/",
                api_com:"{{url("api/compania")}}/",
                message:"hola desde vue",
                name:"",
                addname:"",
                addtip:"",
                addcol:"",
                addfec:"",
                adduse:"",
                adddes:"",
                addcom:"",
                editname:"",
                edittip:"",
                editcol:"",
                editfec:"",
                edituse:"",
                editdes:"",
                editcom:"",
                idproyecto:null,
                proyecto:[],
                colonias:[],
                tipos:[],
                companias:[],
            },
            methods:{
                getProyectos:function () {
                    Swal.fire({
                        title: 'Atención!',
                        text: 'Antes de agregar nuevos proyectos favor de verificar los ' +
                            'tipos de proyectos, compañias y los domicilios existentes en la seccion de catálogos. ' +
                            'En caso de no contar con el solicitado favor de agregarlo.',
                        type: 'info',
                        confirmButtonText: 'Aceptar'
                    });
                    axios.get(this.api).then(response=>{
                        this.proyecto=response.data;
                    }).catch(error=>{

                    });
                },
                getColonias:function () {
                    axios.get(this.api_colonia).then(response=>{
                        this.colonias=response.data;
                    }).catch(error=>{

                    });
                },
                getTipos:function () {
                    axios.get(this.api_tipo).then(response=>{
                        this.tipos=response.data;
                    }).catch(error=>{

                    });
                },
                getCompania:function () {
                    axios.get(this.api_com).then(response=>{
                        this.companias=response.data;
                    }).catch(error=>{

                    });
                },
                selectuser:function (user) {
                    this.adduse=user;
                },
                delProyecto:function (){
                    Swal.fire({
                        title: '¿Está seguro que desea eliminar?',
                        text: "No volveras a usar este dato!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#160909',
                        cancelButtonText: 'Cancelar',
                        confirmButtonText: 'Eliminar',
                    }).then((result) =>  {
                        if(result.value) {
                            console.log("eliminando proyecto..."+this.idproyecto);
                            axios.delete(this.api + this.idproyecto).then(response => {
                                this.getProyectos();
                                Swal.fire({
                                    title: 'Eliminado!',
                                    text: 'Eliminado correctamente',
                                    type: 'success',
                                    confirmButtonColor: '#3f8a29',
                                    confirmButtonText: 'Aceptar'
                                });
                            }).catch(error => {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Acción no autorizada',
                                    type: 'error',
                                    confirmButtonText: 'Aceptar'
                                });
                                console.log(error);
                            });
                        }
                    });
                },
                addProyecto:function () {
                    console.log("agregando pro..."+this.addname+this.adddes+this.addtip+this.addcol+this.addfec);
                    axios.post(this.api,{nombre_proyecto:this.addname,descripcion:this.adddes,id_compania:this.addcom,id_tipoproyecto:this.addtip,
                        id_colonia:this.addcol,fecha:this.addfec,id_user:this.adduse,}).then(response=>{
                        this.getProyectos();
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
                    this.adddes=[''];
                    this.addcom=[''];
                    this.addtip=[''];
                    this.addcol=[''];
                    this.addfec=[''];
                },
                editProyecto:function(post){
                    this.editname=post.nombre_proyecto;
                    this.editdes=post.descripcion;
                    this.editcom=post.id_compania;
                    this.edittip=post.id_tipoproyecto;
                    this.editcol=post.id_colonia;
                    this.editfec=post.fecha;
                    this.edituse=post.id_user;
                    this.idproyecto=post.id_proyecto;
                },
                updateProyecto:function(){
                    console.log("editando pro..."+this.editname+this.editdes+this.edittip+this.editcol+this.editfec+this.edituse);
                    axios.put(this.api+this.idproyecto,{nombre_proyecto:this.editname,descripcion:this.editdes,id_compania:this.editcom,id_tipoproyecto:this.edittip,
                        id_colonia:this.editcol,fecha:this.editfec,id_user:this.edituse}).then(response=>{
                        this.getProyectos();
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
