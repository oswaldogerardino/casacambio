<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Socio;
use App\Facturacompra;
use App\CuentaBancaria;
use App\Banco;

class FacturaexpressController extends Controller
{
    


    public function cedula_consulta(Request $request)
    {
       $documento = $_POST['documento'];
       $slug = uniqid();
       $nombre_cliente = strtoupper($request['nombre']);
       $continuidad = $_POST['continuidad'];
       $cliente = Socio::where('documento', '=', $documento)->get();

        //VARIABLES DE CUENTA BANCARIA
        $banco          = $request['banco'];
        $socio          = $request['socio'];
        $tipo_cuenta    = $request['tipo_cuenta'];
        $n_cuenta       = $request['n_cuenta'];
        $cuenta_existencia = CuentaBancaria::where('cuenta', '=', $n_cuenta)->count();


       //dd($cuentabancaria);
       $existencia_cliente= count($cliente);

       if($existencia_cliente < 1 && $continuidad == 0){ 

        //variable para la fluides de facturacion
            $bancos = Banco::all();

            return view('factura_express.create', compact('documento', 'bancos'));

       }

       elseif($existencia_cliente > 0){
        $nombre_cliente = Socio::where('documento', '=', $documento)->value('nombre');
        $id_cliente = Socio::where('documento', '=', $documento)->value('id');       
        $cuentabancaria = CuentaBancaria::where('socio_id', '=', $id_cliente)->get();


         //FECHA ACTUAL
            $fecha =date("Y-M-d");

            $consulta_facturas = Facturacompra::all()->count();


            //CONDICION PARA LLEVAR A N FACTURAS A 1 SI NO HAY REGISTROS Y NO COMIENCE DE CERO
            if($consulta_facturas == 0){

                $n_facturas = 1;

            }else{

                $n_facturas = $consulta_facturas +1;
            }

        //CODIGO DE FACTURA PARA EL SIGUIENTE REGISTRO
        $codigo_factura = date("Ymd")."-".$n_facturas;


         return view('factura_compra.create', compact('fecha', 'codigo_factura', 'nombre_cliente','id_cliente', 'documento', 'cuentabancaria'));

       }
       elseif($existencia_cliente < 1 && $continuidad == 1){


           //REGISTRO DE SOCIO

            $registro               = new Socio;
            $registro->nombre       = $nombre_cliente;
            $registro->documento    = $request['documento'];
            $registro->telefono     = $request['telefono'];
            $registro->correo       = $request['correo'];
            $registro->codigo       = $slug;
            $registro->save();

            //CAPTURAR ID SOCIO

                $socio = Socio::all();
                $socio = $socio->last();

            //rREGISTRO CUENTA BANCARIA
            $registro2                 = new CuentaBancaria;
            $registro2->cuenta         = $n_cuenta;
            $registro2->banco_id       = $banco;
            $registro2->tipo_cuenta    = $tipo_cuenta;
            $registro2->socio_id       = $socio->id;
            $registro2->save();


            $id_cliente = $socio->id;
            $cuentabancaria = CuentaBancaria::where('socio_id', '=', $id_cliente)->get();

            //FECHA ACTUAL
            $fecha =date("Y-M-d");

            $consulta_facturas = Facturacompra::all()->count();


            //CONDICION PARA LLEVAR A N FACTURAS A 1 SI NO HAY REGISTROS Y NO COMIENCE DE CERO
            if($consulta_facturas == 0){

                $n_facturas = 1;

            }else{

                $n_facturas = $consulta_facturas +1;
            }

        //CODIGO DE FACTURA PARA EL SIGUIENTE REGISTRO
        $codigo_factura = date("Ymd")."-".$n_facturas;
         return view('factura_compra.create', compact('fecha', 'codigo_factura', 'nombre_cliente','id_cliente', 'documento', 'cuentabancaria'));



       }
    

    }




}
