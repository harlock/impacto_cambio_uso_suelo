@extends('layouts.app')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/apexcharts.css')}}">
    <div class="container" id="resultados">
        <section v-cloak>
        <div class="row text-center mb-3">
            <div class="col text-left">
                <a class="btn bg-gradient-dark btn-success" href="{{url("proyectos")}}"><i class="fa fa-arrow-left text-white"></i> <strong class="text-white">Regresar</strong></a>
            </div>
            <div class="col text-right">
                <form action="{{url('pdf/resultados',$id)}}" method="POST" target="_blank" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" v-model="imgGraphic" name="imgGraphic">
                    <input type="hidden" v-model="imgGraphic2" name="imgGraphic2">
                    <div class="row text-right">
                        <div class="col-12">
                            <button type="submit" class="btn btn-icon btn-outline-danger" >
                                <i class="feather icon-save"></i>Generar PDF</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

            <div class="card">
                <div class="row card-header text-center">
                    <div class="col-12 text-center">
                        <h4 class="text-bold-700 text-center">Resultados de la Evaluación</h4>
                        <h4 class="title text-bold-700">@{{ nombre_pro }}</h4>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div id="column-chart"></div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div id="radar-chart"></div>
                    </div>
                </div>
            </div>
            <div class="card card-content">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="text-center">
                        <tr>
                            <th class="col-4"><strong class="text-uppercase text-bold-700">Factores</strong></th>
                            <th v-for="et in etapa" v-bind:value="et.id_etapa" class="text-uppercase text-bold-700"><strong>@{{ et.etapa }}</strong></th>
                            <th><strong class="text-uppercase text-bold-700">Total</strong></th>
                            <th><strong class="text-uppercase text-bold-700">Total sin Abandono</strong></th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <tr v-for="(fac,index) in factores" v-bind:value="fac.id_factor">
                            <td class="col-2 text-uppercase text-bold-700"><strong>@{{ fac.nombre_factor }}</strong></td>
                            <td class="text-bold-600">@{{ valores_preparacion[index] }}</td>
                            <td class="text-bold-600">@{{ valores_construccion[index] }}</td>
                            <td class="text-bold-600">@{{ valores_mantenimiento[index] }}</td>
                            <td class="text-bold-600">@{{ valores_abandono[index] }}</td>
                            <td class="col-1 text-bold-600">@{{ total_valores[index] }}</td>
                            <td class="text-bold-600">@{{ total_sin[index] }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    <!--        <pre>
                @{{ $data }}
            </pre>-->
        </section>
    </div>
@endsection
@section("scripts")
    <script>
        var yaxis_opposite = false;
        if($('html').data('textdirection') == 'rtl'){
            yaxis_opposite = true;
        }

        new Vue({
            el:"#resultados",
            created:function(){
                this.getEtapas();
                this.getFactores();
                this.getvalores();
            },
            data:{
                api_etapa:"{{url("api/etapa")}}/",
                api_factores:"{{url("api/factor")}}/",
                api_total:"{{url("api/total").'/'.$id}}",
                addfactores:'',
                etapa:[],
                factores:[],
                valores_preparacion:[],
                valores_construccion:[],
                valores_mantenimiento:[],
                valores_abandono:[],
                total_valores:[],
                total_sin:[],
                nombre_pro:[],
                themeColors:['#7367F0','#28C76F','#EA5455','#007ec6'],
                imgGraphic:'',
                imgGraphic2:'',
            },
            methods:{
                getEtapas:function () {
                    axios.get(this.api_etapa).then(response=>{
                        this.etapa=response.data;
                    }).catch(error=>{

                    });
                },
                getvalores:function (){
                      axios.get(this.api_total).then(response=>{
                          this.valores_preparacion=response.data.preparacion;
                          this.valores_construccion=response.data.construccion;
                          this.valores_mantenimiento=response.data.mantenimiento;
                          this.valores_abandono=response.data.abandono;
                          this.total_valores=response.data.total;
                          this.total_sin=response.data.totalsin;
                          this.nombre_pro=response.data.datos_proyecto;
                          this.drawGraphicBar();
                          this.drawGraphicRadar();
                      }).catch(error=>{
                      });
                },
                getFactores:function () {
                    axios.get(this.api_factores).then(response=>{
                        this.factores=response.data;
                    }).catch(error=>{

                    });
                },
                drawGraphicBar:function(){

                    var columnChartOptions = {
                        chart: {
                            height: 700,
                            type: 'bar',
                        },
                        colors: this.themeColors,
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                endingShape: 'rounded',
                                columnWidth: '100%',
                            },
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            show: true,
                            width: 2,
                            colors: ['transparent']
                        },
                        series: [{
                            name: 'Preparación',
                            data:this.valores_preparacion,
                        }, {
                            name: 'Construcción',
                            data: this.valores_construccion
                        },{
                            name: 'Mantenimiento',
                            data: this.valores_mantenimiento
                        },
                            {
                                name: 'Abandono',
                                data: this.valores_abandono
                            }],
                        legend: {
                            offsetY: -10
                        },
                        xaxis: {
                            labels:{

                                trim: false,
                                rotate: -90,
                                offsetY: -500,
                            },
                            categories: _.pluck(this.factores,'nombre_factor'),
                        },
                        yaxis: {
                            opposite: yaxis_opposite
                        },
                        fill: {
                            opacity: 1

                        },
                        tooltip: {
                            y: {
                                formatter: function (val) {
                                    return val /*+ " thousands"*/
                                }
                            }
                        }
                    };
                    var columnChart = new ApexCharts(
                        document.querySelector("#column-chart"),
                        columnChartOptions
                    );
                    var self=this;
                    columnChart.render().then(()=>{
                            window.setTimeout(function() {
                                columnChart.dataURI().then((imgURI) => {
                                    self.imgGraphic = imgURI;
                                });
                            },3000);
                    });

                },
                drawGraphicRadar:function(){

                    var radarChartOptions = {
                        chart: {
                            height: 1200,
                            type: 'radar',
                        },
                        colors: this.themeColors,
                        series: [{
                            name: 'Preparación',
                            data:this.valores_preparacion,
                        }, {
                            name: 'Construcción',
                            data: this.valores_construccion,
                        },{
                            name: 'Mantenimiento',
                            data: this.valores_mantenimiento,
                        },
                            {
                                name: 'Abandono',
                                data: this.valores_abandono
                            }],
                        labels: _.pluck(this.factores,'nombre_factor'),
                        dataLabels: {
                            style: {
                                color: this.themeColors,
                            }
                        }
                    }
                    var radarChart = new ApexCharts(
                        document.querySelector("#radar-chart"),
                        radarChartOptions
                    );
                    var self=this;
                    radarChart.render().then(()=>{
                        window.setTimeout(function() {
                            radarChart.dataURI().then((imgURI) => {
                                self.imgGraphic2 = imgURI;
                            });
                        },3000);
                    });
                },
                exportarpdf:function(){

                },
            },
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js" ></script>
    <script src="{{asset('app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
@endsection
