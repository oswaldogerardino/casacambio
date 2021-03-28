<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Configuracion;

class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

        $configuracion   = Configuracion::find(1);
        $nombre_empresa  = $configuracion->nombre_empresa;
        $slogan          = $configuracion->slogan;
        $codigo_empresa  = $configuracion->codigo_empresa;
        $logo            = $configuracion->logo;
        $valor_moneda    = $configuracion->valor_moneda;

        return view('configuracion.configuracion.edit', compact('nombre_empresa','slogan', 'codigo_empresa', 'logo','valor_moneda'));
   

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($_POST['logo']);
        $id                 = 1;
        $update             = Configuracion::find($id);

        $nombre = strtoupper($_POST['nombreempresa']);
        $slogan = strtoupper($_POST['slogan']);

        $update->nombre_empresa = $nombre;
        $update->slogan         = $slogan;
        $update->codigo_empresa = $_POST['codigo'];
        $update->valor_moneda   = $_POST['moneda'];
        $update->save();

        return redirect("configuracion/configuracion")->with('status', 'Actualizaci&oacute;n Exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
