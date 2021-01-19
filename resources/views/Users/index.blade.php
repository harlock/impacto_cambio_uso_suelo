@extends('layouts.app')
@section('content')
    <div class="container" v-cloak id="users">
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
                <br><h3><strong class="text-white"><i class="feather icon-users"></i> USUARIOS</strong></h3>
            </div>

            <div class="table-responsive">
                <br>
                <table class="table table-hover-animation table-hover table-bordered mb-0">
                    <thead>
                    <tr>
                        <th class="text-center text-bold-600">NOMBRE</th>
                        <th class="text-center text-bold-600">PRIMER APELLIDO</th>
                        <th class="text-center text-bold-600">SEGUNDO APELLIDO</th>
                        <th class="text-center text-bold-600">CORREO ELECTRONICO</th>
                        <th class="text-center text-bold-600">TIPO DE USUARIO</th>
                        @if(Auth::user()->id_tipo==1)
                            <th class="text-center text-bold-600 col-auto">Eliminar</th>
                            <th class="text-center text-bold-600 col-auto">Editar</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody class="text-center justify-content-center">
                    <tr  v-for="us in users">
                        <td class="text-bold-600">@{{ us.name }}</td>
                        <td class="text-bold-600">@{{ us.apusuario }}</td>
                        <td class="text-bold-600">@{{ us.amusuario }}</td>
                        <td class="text-bold-600">@{{ us.email }}</td>
                        <td class="text-bold-600">@{{ us.get_tipo_usuario[0].descripcion }}</td>
                        @if(Auth::user()->id_tipo==1)
                            <td class="align-items-center">
                                <button type="button" class="btn col-auto btn-icon btn-outline-danger mr-1 mb-1" data-toggle="tooltip" data-placement="right" title="Eliminar" @click="delPosts(iduser=us.id_user)">
                                    <i class="feather icon-trash-2"></i>
                                </button>
                            </td>
                            <td>
                                <span data-toggle="modal" data-target="#update_modal">
                                    <button type="button" class="btn col-auto btn-icon btn-outline-success mr-1 mb-1" data-toggle="tooltip" data-placement="right" title="Editar" @click="editUser(us)">
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
            @include("Users.partials.delete")
            @include("Users.partials.edit")
            @include("Users.partials.create")
        @endif
        {{--<pre>
            @{{ $data }}
        </pre>--}}
    </div>
@endsection
@section("scripts")
    <script>
        new Vue({
            el:"#users",
            created:function(){
                this.getUsers();
                this.getTipoUsuarios();
            },
            data:{
                api:"{{url("api/user")}}/",
                api_tip:"{{url("api/tipusers")}}/",
                message:"hola desde vue",
                name:"",
                addname:"",
                addtip:"",
                addap:"",
                addam:"",
                addemail:"",
                addpass:"",
                editname:"",
                editap:"",
                editam:"",
                editemail:"",
                editpass:"",
                edittip:" ",
                iduser:null,
                users:[],
                tipouser:[],
            },
            methods:{
                getUsers:function () {
                    axios.get(this.api).then(response=>{
                        this.users=response.data;
                    }).catch(error=>{

                    });
                },
                getTipoUsuarios:function () {
                    axios.get(this.api_tip).then(response=>{
                        this.tipouser=response.data;
                    }).catch(error=>{

                    });
                },
                delPosts:function (){
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
                            console.log("eliminando Usuario..."+this.iduser);
                            axios.delete(this.api+this.iduser).then(response=>{
                                this.getUsers();
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
                addUsers:function () {
                    console.log("agregando user..."+this.addname+this.addap+this.addam+this.addemail+this.addpass+this.addtip);
                    axios.post(this.api,{name:this.addname,apusuario:this.addap,amusuario:this.addam,email:this.addemail,password:this.addpass,id_tipo:this.addtip}).then(response=>{
                        this.getUsers();
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
                    this.addap=[''];
                    this.addam=[''];
                    this.addemail=[''];
                    this.addpass=[''];
                    this.addtip=[''];
                },
                editUser:function(post){
                    this.editname=post.name;
                    this.editap=post.apusuario;
                    this.editam=post.amusuario;
                    this.editemail=post.email;
                    this.edittip=post.id_tipo;
                    this.iduser=post.id_user;
                },
                updateUser:function(){
                    console.log("editando user..."+this.editname+this.editap+this.editam+this.editemail+this.edittip);
                    axios.put(this.api+this.iduser,{name:this.editname,apusuario:this.editap,amusuario:this.editam,email:this.editemail,id_tipo:this.edittip}).then(response=>{
                        this.getUsers();
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
