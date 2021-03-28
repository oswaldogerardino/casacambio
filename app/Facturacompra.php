<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturacompra extends Model
{
    protected $table = "facturacompras";

    protected $fillable = ['id','nombre_depositante', 'cedula_depositante', 'telefono_depositante', 'cuenta_cliente', 'socio_id', 'comision','n_factura', 'cantidad_pesos', 'valor_moneda', 'transferencia', 'status', 'fecha_facturacion', 'imagen', 'comentario', 'puesto_id'];


     public function socio() {
        return $this->belongsTo('App\Socio');
    }
}
