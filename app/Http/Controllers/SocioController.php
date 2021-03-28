<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Socio;
use App\Banco;
use App\Http\Requests\SocioFormRequests;

class SocioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $socios = Socio::all();
        return view('asociacion.socios.index', compact('socios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asociacion.socios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SocioFormRequests $request)
    {

        
        $slug = uniqid();
        $nombre = strtoupper($request['nombre']);
        $documento = $request['documento'];
        $socio_existencia =  Socio::where('documento', '=', $documento)->count();

        if($socio_existencia){

            return redirect('create_socio')->with('error', 'Este documento ya ha sido registrado!!!');

        }else{

            //dd($socio_existencia);

                $registro               = new Socio;
                $registro->nombre       = $nombre;
                $registro->documento    = $request['documento'];
                $registro->telefono     = $request['telefono'];
                $registro->correo       = $request['correo'];
                $registro->codigo       = $slug;
                $registro->save();


               
                return redirect('socios')->with('status', 'Registro Exitoso');
            
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
        $socios = Socio::find($id);
        return view('asociacion.socios.show', compact('socios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $socios = Socio::find($id);
        return view('asociacion.socios.edit', compact('socios'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SocioFormRequests $id)
    {   

        $id                 = $_POST['id'];
        $update             = Socio::find($id);

        $nombre = strtoupper($_POST['nombre']);

        $update->nombre     = $nombre;
        $update->documento  = $_POST['documento'];
        $update->telefono   = $_POST['telefono'];
        $update->correo     = $_POST['correo'];
        $update->save();

        return redirect("edit_socio/$id")->with('status', 'Actualizaci&oacute;n Exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   

        $socio = Socio::whereId($id)->firstOrFail();
        $socio->delete();
        
        return redirect('/socios')->with('status', 'Borrado Exitoso');
    }
}
