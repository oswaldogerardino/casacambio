<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permiso;
use App\Roles;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permisos = Permiso::where('rol_id', '!=', 1)->get();;
        return view('configuracion.permiso.index', compact('permisos'));
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
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permisos = Permiso::whereId($id)->firstOrFail();
        return view('configuracion.permiso.show', compact('permisos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        $post     = $request->all();

        //VATIABLES
        if(isset($post['facturar'])){$facturar= $post['facturar'];}else{$facturar= 0;}
        if(isset($post['crear_cuenta'])){$crear_cuenta= $post['crear_cuenta'];}else{$crear_cuenta= 0;}
        if(isset($post['editar_cuenta'])){$editar_cuenta= $post['editar_cuenta'];}else{$editar_cuenta= 0;}
        if(isset($post['borrar_cuenta'])){$borrar_cuenta= $post['borrar_cuenta'];}else{$borrar_cuenta= 0;}
        if(isset($post['crear_clientes'])){$crear_clientes= $post['crear_clientes'];}else{$crear_clientes= 0;}
        if(isset($post['editar_clientes'])){$editar_clientes= $post['editar_clientes'];}else{$editar_clientes= 0;}
        if(isset($post['borrar_clientes'])){$borrar_clientes= $post['borrar_clientes'];}else{$borrar_clientes= 0;}
        if(isset($post['crear_bancos'])){$crear_bancos= $post['crear_bancos'];}else{$crear_bancos= 0;}
        if(isset($post['editar_bancos'])){$editar_bancos= $post['editar_bancos'];}else{$editar_bancos= 0;}
        if(isset($post['borrar_bancos'])){$borrar_bancos= $post['borrar_bancos'];}else{$borrar_bancos= 0;}
        if(isset($post['ver_fac_pendientes'])){$ver_fac_pendientes= $post['ver_fac_pendientes'];}else{$ver_fac_pendientes= 0;}
        if(isset($post['opciones_fac_pendientes'])){$opciones_fac_pendientes= $post['opciones_fac_pendientes'];}else{$opciones_fac_pendientes= 0;}
        if(isset($post['ver_fac_rechazadas'])){$ver_fac_rechazadas= $post['ver_fac_rechazadas'];}else{$ver_fac_rechazadas= 0;}
        if(isset($post['opciones_fac_rechazadas'])){$opciones_fac_rechazadas= $post['opciones_fac_rechazadas'];}else{$opciones_fac_rechazadas= 0;}
        if(isset($post['ver_fac_aprobadas'])){$ver_fac_aprobadas= $post['ver_fac_aprobadas'];}else{$ver_fac_aprobadas= 0;}
        if(isset($post['opciones_fac_aprobadas'])){$opciones_fac_aprobadas= $post['opciones_fac_aprobadas'];}else{$opciones_fac_aprobadas= 0;}
        if(isset($post['ver_mov_diario'])){$ver_mov_diario= $post['ver_mov_diario'];}else{$ver_mov_diario= 0;}
        if(isset($post['ver_estadisticas'])){$ver_estadisticas= $post['ver_estadisticas'];}else{$ver_estadisticas= 0;}

       
        $update   = Permiso::where('id', '=', $id)->firstOrFail();

            $update->facturar                    = $facturar;
            $update->cuenta_crear                = $crear_cuenta;
            $update->cuenta_editar               = $editar_cuenta;
            $update->cuenta_borrar               = $borrar_cuenta;
            $update->cliente_crear               = $crear_clientes;
            $update->cliente_editar              = $editar_clientes;
            $update->cliente_borrar              = $borrar_clientes;
            $update->banco_crear                 = $crear_bancos;
            $update->banco_editar                = $editar_bancos;
            $update->banco_borrar                = $borrar_bancos;
            $update->factura_pendiente_ver       = $ver_fac_pendientes;
            $update->factura_pendiente_procesos  = $opciones_fac_pendientes;
            $update->factura_rechazada_ver       = $ver_fac_rechazadas;
            $update->factura_rechazada_procesos  = $opciones_fac_rechazadas;
            $update->factura_aprobada_ver        = $ver_fac_aprobadas;
            $update->factura_aprobada_procesos   = $opciones_fac_aprobadas;
            $update->movimientos_diario          = $ver_mov_diario;
            $update->movimientos_estadistica     = $ver_estadisticas;
            $update->save();

            return redirect("/configuracion/permiso/show_permiso/$id")->with('status', 'Actualizaci&oacute;n Exitosa');

       
            

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
