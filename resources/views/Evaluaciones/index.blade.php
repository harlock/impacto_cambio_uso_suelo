@extends('layouts.app')
@section('content')
    <div class="container" v-cloak id="evaluacion">
        <div class="row justify-content-md-center mb-3">
            <div class="col">
                <a class="btn bg-gradient-dark btn-success" href="{{url("proyectos")}}"><i class="fa fa-arrow-left text-white"></i> <strong class="text-white">Regresar</strong></a>
            </div>
        </div>
            <div class="text-center mb-3">
                <h3><strong>EVALUACIÓN DE PROYECTO</strong></h3>
            </div>
            <div class="row justify-content-md-center mb-4">
                <div class="col-8 text-center">
                    <label class="text-dark" for="nombre"><h4>Selecciona Factor:</h4></label>
                </div>
                {{--@{{ id_factor }}--}}
                <select  class="form-control col-6" v-model="id_factor" @change="getCriterios">
                    <option disabled selected>Selecione uno</option>
                    <option v-for="fac in factores" v-bind:value="fac.id_factor">@{{ fac.nombre_factor }}</option>
                </select>
                <div class="text-right ml-5 ">
                    <button type="button" class="btn btn-icon btn-outline-success" data-toggle="modal" data-target="#xlarge">
                        <i class="feather icon-package"></i>ESCALA
                    </button>
                </div>
            </div>

        <div class="card">
           {{-- @{{ valores }}--}}
            <table class="table table-bordered">
                <thead class="text-center">
                <tr>
                    <th><strong class="text-uppercase">Criterios</strong></th>
                    <th v-for="et in etapa" v-bind:value="et.id_etapa" class="text-uppercase"><strong>@{{ et.etapa }}</strong></th>
                </tr>
                </thead>
                <tbody class="text-center">
                    <tr v-for="cri in criterios" v-bind:value="cri.id_criterio">
                        <td class="col-auto text-uppercase" ><strong>@{{ cri.get_criterio[0].descripcion }}</strong></td>
                        <td class="col-auto"><input v-model="valores['preparacion@'+cri.id_asignacriterio]" type="text" class="form-control text-center" required></td>
                        <td class="col-auto"><input v-model="valores['construccion@'+cri.id_asignacriterio]" type="text" class="form-control text-center" required></td>
                        <td class="col-auto"><input v-model="valores['mantenimiento@'+cri.id_asignacriterio]" type="text" class="form-control text-center" required></td>
                        <td class="col-auto"><input v-model="valores['abandono@'+cri.id_asignacriterio]" type="text" class="form-control text-center" required></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="text-center mb-5">
            <button type="button" class="btn col-3 btn-icon btn-outline-success" @click="saveEvaluacion">
                Guardar <i class="ficon feather icon-save text-bold-700"></i>
            </button>
        </div>
        {{--<pre>
            @{{ $data }}
        </pre>--}}
        @if(Auth::check())
            @include("Evaluaciones.partials.herramienta")
        @endif
    </div>
@endsection
@section("scripts")
    <script>
        new Vue({
            el:"#evaluacion",
            created:function(){
                this.getEtapas();
                this.getFactores();
            },
            data:{
                api:"{{url("api/evaluacion").'/'.$id}}",
                api_etapa:"{{url("api/etapa")}}/",
                api_criterio:"{{url("api/asigna").'/'.$id}}/",
                api_factores:"{{url("api/factor")}}/",
                addetapa:"",
                addcriterio:"",
                addfactores:'',
                addproyecto:'',
                idevaluacion:null,
                id_factor:0,
                evaluacion:{},
                etapa:[],
                criterios:[],
                factores:[],
                valores:{},

            },
            methods:{
                getEvaluacion:function (evaluacion) {
                    console.log(evaluacion)
                    for (let i=0; i<evaluacion.length;i++)
                    {
                        let etapa="";
                        switch (evaluacion[i].id_etapa){
                            case 1:
                                etapa='preparacion';
                                break;
                            case 2:
                                etapa='construccion';
                                break;
                            case 3:
                                etapa='mantenimiento';
                                break;
                            case 4:
                                etapa='abandono';
                                break;
                        }
                        etapa=etapa+"@"+evaluacion[i].id_asignacriterio;
                        this.valores[etapa]=evaluacion[i].valor;
                    }
                    /*Swal.fire({
                        title: 'Atención!',
                        text: 'Al comenzar la evaluació favor de asegurarse que todos los campos esten llenos, En la fila de signos ingresar alguno de los siguientes valores:"- , +"',
                        type: 'warning',
                        confirmButtonText: 'Aceptar'
                    });*/
                },
                getEtapas:function () {
                    axios.get(this.api_etapa).then(response=>{
                        this.etapa=response.data;
                    }).catch(error=>{

                    });
                },
                getCriterios:function () {
                    axios.get(this.api_criterio+this.id_factor).then(response=>{
                        this.criterios=response.data.criterios;
                        console.log(response.data)
                        this.getEvaluacion(response.data.evaluacion)
                    }).catch(error=>{

                    });
                },
                getFactores:function () {
                    axios.get(this.api_factores).then(response=>{
                        this.factores=response.data;
                    }).catch(error=>{

                    });
                },
                saveEvaluacion:function (){
                    axios.post(this.api,{factor:this.id_factor,valores:this.valores}).then(response=>{
                        this.getCriterios();
                        Swal.fire({
                            title: 'Guardado Correctamente',
                            type: 'success',
                            confirmButtonText: 'Aceptar'
                        })
                    }).catch(error=>{
                        Swal.fire({
                            title: '¡Error!',
                            text: 'Debe llenar todos los campos',
                            type: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                    });
                },
            },
        });
    </script>
@endsection
