<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banco;
use App\Socio;
use App\CuentaBancaria;
use App\Http\Requests\CuentaBancariaFormRequests;

class CuentabancariaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cuentabancaria = CuentaBancaria::all();
        return view('asociacion.cuentasbancarias.index', compact('cuentabancaria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $bancos = Banco::all();
        $socios = Socio::all();
        return view('asociacion.cuentasbancarias.create', compact('bancos','socios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CuentaBancariaFormRequests $request)
    {

        
        $banco          = $request['banco'];
        $socio          = $request['socio'];
        $tipo_cuenta    = $request['tipo_cuenta'];
        $n_cuenta       = $request['n_cuenta'];
        $cuenta_existencia = CuentaBancaria::where('cuenta', '=', $n_cuenta)->count();


        if($cuenta_existencia == 1){

            return redirect('/create_cuentasbancarias')->with('error', 'Esta cuenta ya ha sido registrada!!!');

        }else{

            //dd($socio_existencia);

            $registro                 = new CuentaBancaria;
            $registro->cuenta         = $n_cuenta;
            $registro->banco_id       = $banco;
            $registro->tipo_cuenta    = $tipo_cuenta;
            $registro->socio_id       = $socio;
            $registro->save();

            //LISTADO DE SOCIOS
            return redirect('/cuentasbancarias')->with('status', 'Registro Exitoso');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuentabancaria =  CuentaBancaria::find($id);
        //dd($cuentabancaria->banco_id);
        $banco          = Banco::find($cuentabancaria->banco_id);
        $cliente        = Socio::find($cuentabancaria->socio_id);

        return view('asociacion.cuentasbancarias.show', compact('cuentabancaria','cliente','banco'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $cuentabancaria = CuentaBancaria::find($id);
        $banco          = Banco::find($cuentabancaria->banco_id);
        $cliente        = Socio::find($cuentabancaria->socio_id);
        $clientes       = Socio::all();
        $bancos         = Banco::all();

        return view('asociacion.cuentasbancarias.edit', compact('cuentabancaria','cliente', 'clientes', 'banco','bancos'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {   

        $update                       = CuentaBancaria::whereId($id)->firstOrFail();

        $update->banco_id             = $_POST['banco'];
        $update->socio_id             = $_POST['socio'];
        $update->cuenta               = $_POST['n_cuenta'];
        $update->tipo_cuenta          = $_POST['tipo_cuenta'];
        $update->save();

        return redirect("/show_cuentasbancarias/$id")->with('status', 'Actualizaci&oacute;n Exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   

        $socio = CuentaBancaria::whereId($id)->firstOrFail();
        $socio->delete();
        
        return redirect('/cuentasbancarias')->with('status', 'Borrado Exitoso');
    }
}
