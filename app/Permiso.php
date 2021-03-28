<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = "permisos";

    protected $fillable = ['id', 'rol_id', 'facturar','cuenta_crear', 'cuenta_editar', 'cuenta_borrar', 'cliente_crear', 'cliente_editar', 'cliente_borrar', 'banco_crear', 'banco_editar', 'banco_borrar', 'factura_pendiente_ver', 'factura_pendiente_procesos', 'factura_rechazada_ver', 'factura_rechazada_procesos', 'factura_aprobada_ver', 'factura_aprobada_procesos', 'movimientos_diario', 'movimientos_estadistica'];

    public function rol() {
        return $this->belongsTo('App\Rol');
    }
}
