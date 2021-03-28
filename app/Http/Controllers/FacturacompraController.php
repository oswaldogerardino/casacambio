<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Socio;
use App\Facturacompra;
use App\CuentaBancaria;
use App\Banco;
use App\Http\Requests\FacturacompraFormRequests;
use App\Http\Requests\RechazoFormRequests;
use App\Http\Requests\CedulaCompraFormRequests;

class FacturacompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factura = Facturacompra::where('status', '=', 1)->orderBy('id', 'DESC')->get();
        return view('factura_compra.index', compact('factura'));
    }

    public function lista_aprobar()
    {

        $factura = Facturacompra::where('status', '=', 2)->get();
        return view('factura_compra.lista_aprobadas', compact('factura'));
    }

    public function lista_rechazar()
    {

        $factura = Facturacompra::where('status', '=', 0)->get();
        return view('factura_compra.lista_rechazadas', compact('factura'));
    }

    public function ver_aprobar($id)
    {

        $factura   = Facturacompra::find($id);
        return view('factura_compra.aprobar', compact('factura'));
    }

    public function guardar_aprobar(Request $request, $id)
    {  

        //dd($request->file('file'));

       //Numero de factura
       $numero_factura = Facturacompra::where('id', '=', $id)->value("n_factura");


       if($request->hasFile('file') ){ 

           $file = $request->file('file');

           //extension del archivo
           $extension = substr(strrchr($file->getClientOriginalName(), "."), 1); 

           //obtenemos el nombre del archivo
           $nombre = $numero_factura.".".$extension;
     
           //indicamos que queremos guardar un nuevo archivo en el disco local
           \Storage::disk('imagenes')->put($nombre,  \File::get($file));

        }else{
            $nombre = "";
        }


        $factura    = Facturacompra::whereId($id)->firstOrFail();

        $factura->status = 2;
        $factura->imagen = $nombre;
        $factura->save();

        return redirect("/facturascompras")->with('status', "Factura #$numero_factura ha sido aprobada correctamente");
    }


    public function ver_rechazar($id)
    {

        $factura   = Facturacompra::find($id);
        return view('factura_compra.rechazar', compact('factura'));
    }

    public function guardar_rechazar(RechazoFormRequests $request, $id)
    {

        //Numero de factura
       $numero_factura = Facturacompra::where('id', '=', $id)->value("n_factura");
       $imagen = Facturacompra::where('id', '=', $id)->value("imagen");
       $comentario = $request->get("comentario");

        $factura             = Facturacompra::whereId($id)->firstOrFail();
        $factura->status     = 0;
        $factura->imagen     = "";
        $factura->comentario = $comentario;
        $factura->save();

        return redirect("/facturascompras")->with('status', "Factura #$numero_factura ha sido rechazada");

    }

    public function cedula_consulta(Request $request)
    {
       $documento = $_POST['documento'];
       $cliente = Socio::where('documento', '=', $documento)->get();
       $id_cliente = Socio::where('documento', '=', $documento)->value('id');
       $nombre_cliente = Socio::where('documento', '=', $documento)->value('nombre');
       $cuentabancaria = CuentaBancaria::where('socio_id', '=', $id_cliente)->get();
       //dd($cuentabancaria);
       $existencia_cliente= count($cliente);

       if($existencia_cliente < 1){ 

        //variable para la fluides de facturacion
        $continuidad= 1;

            return view('asociacion.socios.create_express', compact('documento', 'continuidad'));

       }else{

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
       //dd($existencia_cliente);

       //return view('factura_compra.cedula', compact('datos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function ImprimirPdf($id){

        $factura   = Facturacompra::find($id);
        $socio     = Socio::where('id', '=', $factura->socio_id)->get();
        $cuentabancaria = CuentaBancaria::where('id', '=', $factura->cuenta_cliente)->value('cuenta');
        $banco_id       = CuentaBancaria::where('id', '=', $factura->cuenta_cliente)->value('banco_id');
        $banco          = Banco::where('id', '=', $banco_id)->value('nombre');
        $tipo_cuenta    = CuentaBancaria::where('id', '=', $factura->cuenta_cliente)->value("tipo_cuenta");

        return view('factura_compra.imprimir', compact('banco', 'tipo_cuenta', 'factura','socio','cuentabancaria'));
    }

    public function GetProductos(Request $request){

        // $id = $post['socio'];
        $id = $request->get('socio');
        $producto = Producto::where('socio_id', '=', $id)->get();

        return response()->json($producto);
    }



    public function StatusAceptar($id){
        $factura   = Facturacompra::find($id);
       
        $detalle    = Detallefactura::where('n_factura', '=', $factura->n_factura)->get();

        $datos = json_decode($detalle);
        

        foreach ($datos as $key => $value) {

            $stock  =  Inventario::where('producto_id', '=', $value->id_producto)->value('n_productos');

            $nueva_cantidad = $stock + $value->cantidad;

            $update               =  Inventario::find($value->id_producto);
            $update->n_productos  =  $nueva_cantidad;
            $update->save();


        }

        //CAMBIAR STATUS
        $update2             = Facturacompra::find($id);
        $update2->status     = 2;
        $update2->save();

        return redirect("facturascompras")->with('status', 'Status Actualizado: Aceptado');
        

    }

    public function StatusCalcelar($id){

        $update             = Facturacompra::find($id);
        $update->status   	= 0;
        $update->save();

        return redirect("facturascompras")->with('status', 'Status Actualizado: Cancelado');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    	//TABLA FACTURA
        $registro                       = new Facturacompra;
        $registro->nombre_depositante   = $request['nombre_depositante'];
        $registro->cedula_depositante   = $request['cedula_depositante'];
        $registro->telefono_depositante = $request['telefono_depositante'];
        $registro->cuenta_cliente       = $request['cuenta_cliente'];
        $registro->socio_id  		    = $request['id_cliente'];
        $registro->comision    		    = $request['comision'];
        $registro->n_factura 		    = $request['n_factura'];
        $registro->cantidad_pesos       = $request['cantidad_pesos'];
        $registro->valor_moneda         = $request['valor_moneda'];
        $registro->puesto_id            = $request['puesto'];

        //CALCULAR TRANSFERENCIA
        $transferencia  = $request['cantidad_pesos'] / $request['valor_moneda'];

        $registro->transferencia       =  $transferencia;
        $registro->fecha_facturacion   = date("Y-m-d");
        $registro->save();
        

        return redirect("facturascompras")->with('status', 'Facturaci&oacute;n Exitosa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $factura        = Facturacompra::find($id);
        $socio          = Socio::where('id', '=', $factura->socio_id)->get();
        $tipo_cuenta    = CuentaBancaria::where('id', '=', $factura->cuenta_cliente)->value("tipo_cuenta");
        $cuentabancaria = CuentaBancaria::where('id', '=', $factura->cuenta_cliente)->value('cuenta');
        $banco_id       = CuentaBancaria::where('id', '=', $factura->cuenta_cliente)->value('banco_id');
        $banco          = Banco::where('id', '=', $banco_id)->value('nombre');
    	return view('factura_compra/show', compact('banco', 'tipo_cuenta','factura','socio','cuentabancaria'));
    }

    

}
