@extends('master')
@section('title', 'Estatisticas de compra')
@section('active-compra', 'active')
@section('active-compra-estadisticas', 'active')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Estadisticas de las Facturaciones realizadas
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="{{ url('/dash') }}">
                    <i class="fa fa-dashboard">
                    </i>
                    Inicio
                </a>
            </li>
        </ol>
    </section>
    <section class="content">
       <div class="box">
            <div class="box-header">          
                @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div>
                    <form method="POST">
                        Consultar a&ntilde;o 
                        <select name="anio">
                            <option style="background-color: green; color: white;" value="{{$anio_actual}}">{{$anio_actual}}</option>
                            <option>&nbsp;</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                        </select>
                        <input type="submit" value="Ok">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    </form>

                </div>
                <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        
                <script type="text/javascript">

                        Highcharts.chart('container', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Estadisticas de Facturaciones del <b>{{$anio_actual}}</b>'
                            },
                            subtitle: {
                                text: 'Cantidad de facturas por mes'
                            },
                            xAxis: {
                                categories: [
                                    'Ene',
                                    'Feb',
                                    'Mar',
                                    'Abr',
                                    'May',
                                    'Jun',
                                    'Jul',
                                    'Ago',
                                    'Sep',
                                    'Oct',
                                    'Nov',
                                    'Dic'
                                ],
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Cantidad de Facturaciones'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Facturaciones',
                                data: [
                                
                                    //ENERO
                                    {{$ventas_enero}}, 

                                    //FEBRERO
                                    {{$ventas_febrero}}, 

                                    //MARZO
                                    {{$ventas_marzo}}, 

                                    //ABRIL
                                    {{$ventas_abril}}, 

                                    //MAYO
                                    {{$ventas_mayo}},

                                    //JUNIO 
                                    {{$ventas_junio}}, 

                                    //JULIO
                                    {{$ventas_julio}}, 

                                    //AGOSTO
                                    {{$ventas_agosto}}, 

                                    //SEPTIEMBRE
                                    {{$ventas_septiembre}}, 

                                    //OCTUBRE
                                    {{$ventas_octubre}}, 

                                    //NOVIEMBRE
                                    {{$ventas_noviembre}}, 

                                    //DICIEMBRE
                                    {{$ventas_diciembre}}

                                ]

                            }]
                        });
                </script>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->



       <div class="box">
            <div class="box-header">          
                @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <div id="container2"></div>



                <script type="text/javascript">

                        Highcharts.chart('container2', {

                            title: {
                                text: 'Estadisticas de Facturaciones Anuales'
                            },

                            subtitle: {
                                text: 'Cantidad de Facturaciones Anuales'
                            },

                            yAxis: {
                                title: {
                                    text: 'Cantidad de Facturaciones'
                                }
                            },
                            legend: {
                                layout: 'vertical',
                                align: 'right',
                                verticalAlign: 'middle'
                            },

                            plotOptions: {
                                series: {
                                    label: {
                                        connectorAllowed: false
                                    },
                                    pointStart: 2017
                                }
                            },

                            series: [{
                                name: 'Rango de Ventas',
                                data: [

                                     {{$total_2017}}, 

                                     {{$total_2018}}, 

                                     {{$total_2019}}, 

                                     {{$total_2020}}, 

                                     {{$total_2021}}, 

                                ]
                            }],

                            responsive: {
                                rules: [{
                                    condition: {
                                        maxWidth: 500
                                    },
                                    chartOptions: {
                                        legend: {
                                            layout: 'horizontal',
                                            align: 'center',
                                            verticalAlign: 'bottom'
                                        }
                                    }
                                }]
                            }

                        });
                </script>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>
</div>
@endsection
