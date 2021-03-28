<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Socio;
use App\Puesto;
use App\Facturacompra;
use App\Http\Controllers\Controller;

class EstadisticaCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //A#O ACTUAL DE LA PRIMERA VISTA
        $anio_actual = date("Y");

        //VARIABLES

            //CONSULTA ENERO
            $enero_inicial = $anio_actual."-"."01"."-"."01";
            $enero_final   = $anio_actual."-"."01"."-"."31";
            $ventas_enero  = Facturacompra::where('fecha_facturacion', '>=', $enero_inicial)->where('fecha_facturacion', '<=', $enero_final)->count();

            //CONSULTA FEBRERO
            $febrero_inicial = $anio_actual."-"."02"."-"."01";
            $febrero_final   = $anio_actual."-"."02"."-"."28";
            $ventas_febrero  = Facturacompra::where('fecha_facturacion', '>=', $febrero_inicial)->where('fecha_facturacion', '<=', $febrero_final)->where('status', '=', 1)->count();

            //CONSULTA MARZO
            $marzo_inicial = $anio_actual."-"."03"."-"."01";
            $marzo_final   = $anio_actual."-"."03"."-"."31";
            $ventas_marzo  = Facturacompra::where('fecha_facturacion', '>=', $marzo_inicial)->where('fecha_facturacion', '<=', $marzo_final)->where('status', '=', 1)->count();

            //CONSULTA ABRIL
            $abril_inicial = $anio_actual."-"."04"."-"."01";
            $abril_final   = $anio_actual."-"."04"."-"."30";
            $ventas_abril  = Facturacompra::where('fecha_facturacion', '>=', $abril_inicial)->where('fecha_facturacion', '<=', $abril_final)->where('status', '=', 1)->count();

            //CONSULTA MAYO
            $mayo_inicial = $anio_actual."-"."05"."-"."01";
            $mayo_final   = $anio_actual."-"."05"."-"."31";
            $ventas_mayo  = Facturacompra::where('fecha_facturacion', '>=', $mayo_inicial)->where('fecha_facturacion', '<=', $mayo_final)->where('status', '=', 1)->count();

            //CONSULTA JUNIO
            $junio_inicial = $anio_actual."-"."06"."-"."01";
            $junio_final   = $anio_actual."-"."06"."-"."30";
            $ventas_junio  = Facturacompra::where('fecha_facturacion', '>=', $junio_inicial)->where('fecha_facturacion', '<=', $junio_final)->where('status', '=', 1)->count();

             //CONSULTA JULIO
            $julio_inicial = $anio_actual."-"."07"."-"."01";
            $julio_final   = $anio_actual."-"."07"."-"."31";
            $ventas_julio  = Facturacompra::where('fecha_facturacion', '>=', $julio_inicial)->where('fecha_facturacion', '<=', $julio_final)->where('status', '=', 2)->count();

            //CONSULTA AGOSTO
            $agosto_inicial = $anio_actual."-"."08"."-"."01";
            $agosto_final   = $anio_actual."-"."08"."-"."31";
            $ventas_agosto  = Facturacompra::where('fecha_facturacion', '>=', $agosto_inicial)->where('fecha_facturacion', '<=', $agosto_final)->where('status', '=', 1)->count();

            //CONSULTA SEPTIEMBRE
            $septiembre_inicial = $anio_actual."-"."09"."-"."01";
            $septiembre_final   = $anio_actual."-"."09"."-"."30";
            $ventas_septiembre  = Facturacompra::where('fecha_facturacion', '>=', $septiembre_inicial)->where('fecha_facturacion', '<=', $septiembre_final)->where('status', '=', 1)->count();

            //CONSULTA OCTUBRE
            $octubre_inicial = $anio_actual."-"."10"."-"."01";
            $octubre_final   = $anio_actual."-"."10"."-"."30";
            $ventas_octubre  = Facturacompra::where('fecha_facturacion', '>=', $octubre_inicial)->where('fecha_facturacion', '<=', $octubre_final)->where('status', '=', 1)->count();

            //CONSULTA NOVIEMBRE
            $noviembre_inicial = $anio_actual."-"."11"."-"."01";
            $noviembre_final   = $anio_actual."-"."11"."-"."30";
            $ventas_noviembre  = Facturacompra::where('fecha_facturacion', '>=', $noviembre_inicial)->where('fecha_facturacion', '<=', $noviembre_final)->where('status', '=', 1)->count();

             //CONSULTA DICIEMBRE
            $diciembre_inicial = $anio_actual."-"."12"."-"."01";
            $diciembre_final   = $anio_actual."-"."12"."-"."30";
            $ventas_diciembre  = Facturacompra::where('fecha_facturacion', '>=', $diciembre_inicial)->where('fecha_facturacion', '<=', $diciembre_final)->where('status', '=', 1)->count();




            //CONSULTA POS A#OS

            //CONSULTA 2017
            $anio_inicio_2017 = "2017"."-"."01"."-"."01";
            $anio_final_2017  = "2017"."-"."12"."-"."31";
            $total_2017  = Facturacompra::where('fecha_facturacion', '>=', $anio_inicio_2017)->where('fecha_facturacion', '<=', $anio_final_2017)->where('status', '=', 1)->count();

            //CONSULTA 2018
            $anio_inicio_2018 = "2018"."-"."01"."-"."01";
            $anio_final_2018  = "2018"."-"."12"."-"."31";
            $total_2018  = Facturacompra::where('fecha_facturacion', '>=', $anio_inicio_2018)->where('fecha_facturacion', '<=', $anio_final_2018)->where('status', '=', 1)->count();

            //CONSULTA 2019
            $anio_inicio_2019 = "2019"."-"."01"."-"."01";
            $anio_final_2019  = "2019"."-"."12"."-"."31";
            $total_2019  = Facturacompra::where('fecha_facturacion', '>=', $anio_inicio_2019)->where('fecha_facturacion', '<=', $anio_final_2019)->where('status', '=', 1)->count();

            //CONSULTA 2020
            $anio_inicio_2020 = "2020"."-"."01"."-"."01";
            $anio_final_2020  = "2020"."-"."12"."-"."31";
            $total_2020  = Facturacompra::where('fecha_facturacion', '>=', $anio_inicio_2020)->where('fecha_facturacion', '<=', $anio_final_2020)->where('status', '=', 1)->count();

             //CONSULTA 2021
            $anio_inicio_2021 = "2020"."-"."01"."-"."01";
            $anio_final_2021  = "2020"."-"."12"."-"."31";
            $total_2021  = Facturacompra::where('fecha_facturacion', '>=', $anio_inicio_2021)->where('fecha_facturacion', '<=', $anio_final_2021)->where('status', '=', 1)->count();



        return view('estadistica_compra.index', compact('anio_actual','ventas_enero','ventas_febrero','ventas_marzo','ventas_abril', 'ventas_mayo', 'ventas_junio', 'ventas_julio', 'ventas_agosto', 'ventas_septiembre', 'ventas_octubre', 'ventas_noviembre', 'ventas_diciembre', 'total_2017','total_2018','total_2019','total_2020', 'total_2021'));
    }

    public function consultaanio()
    {
        
        //A#O ACTUAL DE LA PRIMERA VISTA
        $anio_actual = $_POST['anio'];

        //VARIABLES

            //CONSULTA ENERO
            $enero_inicial = $anio_actual."-"."01"."-"."01";
            $enero_final   = $anio_actual."-"."01"."-"."31";
            $ventas_enero  = Facturacompra::where('fecha_facturacion', '>=', $enero_inicial)->where('fecha_facturacion', '<=', $enero_final)->where('status', '=', 1)->count();

            //CONSULTA FEBRERO
            $febrero_inicial = $anio_actual."-"."02"."-"."01";
            $febrero_final   = $anio_actual."-"."02"."-"."28";
            $ventas_febrero  = Facturacompra::where('fecha_facturacion', '>=', $febrero_inicial)->where('fecha_facturacion', '<=', $febrero_final)->where('status', '=', 1)->count();

            //CONSULTA MARZO
            $marzo_inicial = $anio_actual."-"."03"."-"."01";
            $marzo_final   = $anio_actual."-"."03"."-"."31";
            $ventas_marzo  = Facturacompra::where('fecha_facturacion', '>=', $marzo_inicial)->where('fecha_facturacion', '<=', $marzo_final)->where('status', '=', 1)->count();

            //CONSULTA ABRIL
            $abril_inicial = $anio_actual."-"."04"."-"."01";
            $abril_final   = $anio_actual."-"."04"."-"."30";
            $ventas_abril  = Facturacompra::where('fecha_facturacion', '>=', $abril_inicial)->where('fecha_facturacion', '<=', $abril_final)->where('status', '=', 1)->count();

            //CONSULTA MAYO
            $mayo_inicial = $anio_actual."-"."05"."-"."01";
            $mayo_final   = $anio_actual."-"."05"."-"."31";
            $ventas_mayo  = Facturacompra::where('fecha_facturacion', '>=', $mayo_inicial)->where('fecha_facturacion', '<=', $mayo_final)->where('status', '=', 1)->count();

            //CONSULTA JUNIO
            $junio_inicial = $anio_actual."-"."06"."-"."01";
            $junio_final   = $anio_actual."-"."06"."-"."30";
            $ventas_junio  = Facturacompra::where('fecha_facturacion', '>=', $junio_inicial)->where('fecha_facturacion', '<=', $junio_final)->where('status', '=', 1)->count();

             //CONSULTA JULIO
            $julio_inicial = $anio_actual."-"."07"."-"."01";
            $julio_final   = $anio_actual."-"."07"."-"."31";
            $ventas_julio  = Facturacompra::where('fecha_facturacion', '>=', $julio_inicial)->where('fecha_facturacion', '<=', $julio_final)->where('status', '=', 1)->count();

            //CONSULTA AGOSTO
            $agosto_inicial = $anio_actual."-"."08"."-"."01";
            $agosto_final   = $anio_actual."-"."08"."-"."31";
            $ventas_agosto  = Facturacompra::where('fecha_facturacion', '>=', $agosto_inicial)->where('fecha_facturacion', '<=', $agosto_final)->where('status', '=', 1)->count();

            //CONSULTA SEPTIEMBRE
            $septiembre_inicial = $anio_actual."-"."09"."-"."01";
            $septiembre_final   = $anio_actual."-"."09"."-"."30";
            $ventas_septiembre  = Facturacompra::where('fecha_facturacion', '>=', $septiembre_inicial)->where('fecha_facturacion', '<=', $septiembre_final)->where('status', '=', 1)->count();

            //CONSULTA OCTUBRE
            $octubre_inicial = $anio_actual."-"."10"."-"."01";
            $octubre_final   = $anio_actual."-"."10"."-"."30";
            $ventas_octubre  = Facturacompra::where('fecha_facturacion', '>=', $octubre_inicial)->where('fecha_facturacion', '<=', $octubre_final)->where('status', '=', 1)->count();

            //CONSULTA NOVIEMBRE
            $noviembre_inicial = $anio_actual."-"."11"."-"."01";
            $noviembre_final   = $anio_actual."-"."11"."-"."30";
            $ventas_noviembre  = Facturacompra::where('fecha_facturacion', '>=', $noviembre_inicial)->where('fecha_facturacion', '<=', $noviembre_final)->where('status', '=', 1)->count();

             //CONSULTA DICIEMBRE
            $diciembre_inicial = $anio_actual."-"."12"."-"."01";
            $diciembre_final   = $anio_actual."-"."12"."-"."30";
            $ventas_diciembre  = Facturacompra::where('fecha_facturacion', '>=', $diciembre_inicial)->where('fecha_facturacion', '<=', $diciembre_final)->where('status', '=', 1)->count();


            //CONSULTA POS A#OS

            //CONSULTA 2017
            $anio_inicio_2017 = "2017"."-"."01"."-"."01";
            $anio_final_2017  = "2017"."-"."12"."-"."31";
            $total_2017  = Facturacompra::where('fecha_facturacion', '>=', $anio_inicio_2017)->where('fecha_facturacion', '<=', $anio_final_2017)->where('status', '=', 1)->count();

            //CONSULTA 2018
            $anio_inicio_2018 = "2018"."-"."01"."-"."01";
            $anio_final_2018  = "2018"."-"."12"."-"."31";
            $total_2018  = Facturacompra::where('fecha_facturacion', '>=', $anio_inicio_2018)->where('fecha_facturacion', '<=', $anio_final_2018)->where('status', '=', 1)->count();

            //CONSULTA 2019
            $anio_inicio_2019 = "2019"."-"."01"."-"."01";
            $anio_final_2019  = "2019"."-"."12"."-"."31";
            $total_2019  = Facturacompra::where('fecha_facturacion', '>=', $anio_inicio_2019)->where('fecha_facturacion', '<=', $anio_final_2019)->where('status', '=', 1)->count();

            //CONSULTA 2020
            $anio_inicio_2020 = "2020"."-"."01"."-"."01";
            $anio_final_2020  = "2020"."-"."12"."-"."31";
            $total_2020  = Facturacompra::where('fecha_facturacion', '>=', $anio_inicio_2020)->where('fecha_facturacion', '<=', $anio_final_2020)->where('status', '=', 1)->count();

             //CONSULTA 2021
            $anio_inicio_2021 = "2020"."-"."01"."-"."01";
            $anio_final_2021  = "2020"."-"."12"."-"."31";
            $total_2021  = Facturacompra::where('fecha_facturacion', '>=', $anio_inicio_2021)->where('fecha_facturacion', '<=', $anio_final_2021)->where('status', '=', 1)->count();


        return view('estadistica_compra.index', compact('anio_actual','ventas_enero','ventas_febrero','ventas_marzo','ventas_abril', 'ventas_mayo', 'ventas_junio', 'ventas_julio', 'ventas_agosto', 'ventas_septiembre', 'ventas_octubre', 'ventas_noviembre', 'ventas_diciembre', 'total_2017','total_2018','total_2019','total_2020', 'total_2021'));
    }

    public function diario(){

        $fecha  = date("Y-m-d");
        $puestos = Puesto::all();
        $puesto  = null;


        //CONSULTA
        $consulta_ingreso  = Facturacompra::where('fecha_facturacion', '=', $fecha)->where('status', '=', 2)->get();


        return view('estadistica_compra.ingreso_diario', compact('consulta_ingreso','fecha','puestos','puesto'));


    }

     public function diario_consulta(){

        $fecha  = $_POST['fecha'];
        $puesto = $_POST['puesto'];
        $puestos = Puesto::all();

        if($puesto != 0){
            $consulta_ingreso  = Facturacompra::where('fecha_facturacion', '=', $fecha)->where('status', '=', 2)->where('puesto_id', '=', $puesto)->get();
        }else{
            $consulta_ingreso  = Facturacompra::where('fecha_facturacion', '=', $fecha)->where('status', '=', 2)->get();
        }


        return view('estadistica_compra.ingreso_diario', compact('consulta_ingreso','fecha', 'puesto','puestos'));


    }


}
