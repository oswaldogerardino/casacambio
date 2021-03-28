<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Puesto;
use App\User;

class PuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puestos = Puesto::all();
        return view('configuracion.puesto.index', compact('puestos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.puesto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre = strtoupper($request->get('nombre'));

        //REGISTRO PUESTOS
        $puesto = new Puesto(array(
            'nombre' => $nombre,
        ));

        $puesto->save();

        return redirect('/configuracion/puesto')->with('status', 'Registro Exitoso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $puestos = Puesto::whereId($id)->firstOrFail();
        return view('configuracion.puesto.show', compact('puestos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $puesto = Puesto::whereId($id)->firstOrFail();
        return view('configuracion.puesto.edit', compact('puesto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $puesto    = Puesto::whereId($id)->firstOrFail();
        $nombre    = strtoupper($request->get('nombre'));

        $puesto->nombre = $nombre;
        $puesto->save();

        return redirect('/configuracion/puesto/')->with('status', 'Actualizacion Exitosa.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                $clientes_existencia =  User::where('puesto_id', '=', $id)->count();

                //dd($clientes_existencia);

                if($clientes_existencia > 0){

                    return redirect("/configuracion/puesto/show_puesto/$id")->with('error', 'Este Rol no puede ser borrado, ya está en uso!');

                }else{

                    //ELIMINAR PUESTO
                    $puesto = Puesto::whereId($id)->firstOrFail();
                    $puesto->delete();
                    return redirect('/configuracion/puesto')->with('status', 'Borrado Exitoso ');
            }

    }
}
