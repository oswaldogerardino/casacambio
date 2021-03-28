<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banco;
use App\Http\Requests\BancoFormRequests;

class BancoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $banco = Banco::all();
        return view('bancos.index', compact('banco'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bancos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BancoFormRequests $request)
    {

        
        $slug = uniqid();
        $nombre = strtoupper($request['nombre']);
        $socio_existencia =  Banco::where('nombre', '=', $nombre)->count();

        if($socio_existencia){

            return redirect('/create_banco')->with('error', 'Este BANCO ya ha sido registrado!!!');

        }else{

            //dd($socio_existencia);

            $registro               = new Banco;
            $registro->nombre       = $nombre;
            $registro->save();

            //LISTADO DE SOCIOS
            return redirect('/bancos')->with('status', 'Registro Exitoso');
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
        $bancos = Banco::find($id);
        return view('bancos.show', compact('bancos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $bancos = Banco::find($id);
        return view('bancos.edit', compact('bancos'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BancoFormRequests $id)
    {   

        $id                 = $_POST['id'];
        $update             = Banco::find($id);

        $nombre = strtoupper($_POST['nombre']);
        $update->nombre     = $nombre;
        $update->save();

        return redirect("/show_banco/$id")->with('status', 'Actualizaci&oacute;n Exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   

        $socio = Banco::whereId($id)->firstOrFail();
        $socio->delete();
        
        return redirect('/bancos')->with('status', 'Borrado Exitoso');
    }
}
