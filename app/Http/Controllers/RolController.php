<?php

namespace App\Http\Controllers;

use App\Http\Requests\RolFormRequest;
use App\Rol;
use App\Permiso;
use App\User;
use Illuminate\Http\Request;

class RolController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $rols = Rol::where('id', '!=', 1)->get();
        return view('configuracion.rol.index', compact('rols'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view('configuracion.rol.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolFormRequest $request) {
        //


        $nombre = strtoupper($request->get('nombre'));

        //REGISTRO ROLS
        $rol = new Rol(array(
            'nombre' => $nombre,
        ));


        $rol->save();

        //ULTIMO ROL
        $rol_id = Rol::all();
        $rol_id = $rol_id->last();
        //dd($rol_id->id);
        //REGISTRAR PRIMER PERMISO
            $registrar                              = new Permiso;
            $registrar->rol_id                      = $rol_id->id;
            $registrar->facturar                    = 0;
            $registrar->cuenta_crear                = 0;
            $registrar->cuenta_editar               = 0;
            $registrar->cuenta_borrar               = 0;
            $registrar->cliente_crear               = 0;
            $registrar->cliente_editar              = 0;
            $registrar->cliente_borrar              = 0;
            $registrar->banco_crear                 = 0;
            $registrar->banco_editar                = 0;
            $registrar->banco_borrar                = 0;
            $registrar->factura_pendiente_ver       = 0;
            $registrar->factura_pendiente_procesos  = 0;
            $registrar->factura_rechazada_ver       = 0;
            $registrar->factura_rechazada_procesos  = 0;
            $registrar->factura_aprobada_ver        = 0;
            $registrar->factura_aprobada_procesos   = 0;
            $registrar->movimientos_diario          = 0;
            $registrar->movimientos_estadistica     = 0;
            $registrar->save();


        return redirect('/configuracion/roles')->with('status', 'Registro Exitoso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
        $rol = Rol::whereId($id)->firstOrFail();
        return view('configuracion.rol.show', compact('rol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
        $rol = Rol::whereId($id)->firstOrFail();
        return view('configuracion.rol.edit', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RolFormRequest $request, $id) {
        //

        $rol    = Rol::whereId($id)->firstOrFail();
        $nombre = strtoupper($request->get('nombre'));

        $rol->nombre = $nombre;
        $rol->save();

        return redirect('/configuracion/roles/')->with('status', 'Actualizacion Exitosa.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {


        $clientes_existencia =  User::where('rol_id', '=', $id)->count();

        //dd($clientes_existencia);

        if($clientes_existencia > 0){

            return redirect("/configuracion/roles/$id")->with('error', 'Este Rol no puede ser borrado, ya está en uso!');
           
        }else{

             //ELIMINAR PERMISO
            $permiso_id =  Permiso::where('rol_id', '=', $id)->value("id");
            //dd($permiso_id);
            $permiso    =  Permiso::whereId($permiso_id)->firstOrFail();
            $permiso->delete();

            //ELIMINAR ROL
            $rol = Rol::whereId($id)->firstOrFail();
            $rol->delete();

        

            return redirect('/configuracion/roles')->with('status', 'Borrado Exitoso ');

        }
    }
}
