<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserFormRequest;
use App\Http\Requests\UsuarioFormRequest;
use App\Puesto;
use App\Rol;
use App\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $datos = User::where('rol_id', '!=', 1)->get();
        return view('configuracion.usuario.index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        $roles   = Rol::where('id', '!=', 1)->get();
        $puestos = Puesto::all();
        return view('configuracion.usuario.create', compact('roles', 'puestos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioFormRequest $request) {
        //
        // dd($request;
        //dd($request->all());

        $nombre = strtoupper($request->get('nombre'));

        $datos = new User(array(
            'nombre'    => $nombre,
            'email'     => $request->get('email'),
            'rol_id'    => $request->get('rol'),
            'puesto_id' => $request->get('puesto'),
            'password'  => bcrypt($request->get('clave')),
        ));

        $datos->save();

        return redirect('/configuracion/usuario')->with('status', 'Registro Exitoso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
        $datos = User::whereId($id)->firstOrFail();
        return view('configuracion.usuario.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
        $roles   = Rol::all();
        $puestos = Puesto::all();
        $datos   = User::whereId($id)->firstOrFail();
        return view('configuracion.usuario.edit', compact('datos', 'roles', 'puestos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserFormRequest $request, $id) {
        //

        //dd($request->all());

        $email    = $request->get('email');
        $sql      = User::whereEmail($email)->firstOrFail();
        $cantidad = count($sql);

        if ($cantidad <= 1) {

            $datos  = User::whereId($id)->firstOrFail();
            $nombre = strtoupper($request->get('nombre'));

            if ($request->get('clave') == null) {

                $datos->nombre     = $nombre;
                $datos->email      = $request->get('email');
                $datos->rol_id     = $request->get('rol');
                $datos->puesto_id  = $request->get('puesto');
                $datos->save();

                return redirect('/configuracion/usuario')->with('status', 'Actualizacion Exitosa.');
            } else {
                $datos->nombre   = $nombre;
                $datos->email    = $request->get('email');
                $datos->rol_id   = $request->get('rol');
                $datos->puesto_id  = $request->get('puesto');
                $datos->password = bcrypt($request->get('clave'));
                $datos->save();

                return redirect('/configuracion/usuario')->with('status', 'Actualizacion Exitosa.');
            }
        } else {
            return redirect('/configuracion/usuario')->with('status-error', 'El email que intenta registrar ya existe.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
        $datos = User::whereId($id)->firstOrFail();
        $datos->delete();
        return redirect('/configuracion/usuario')->with('status', 'Borrado Exitoso');
    }
}
