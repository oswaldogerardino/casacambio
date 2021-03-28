<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    protected $table = "socios";

    protected $fillable = ['id','nombre','correo','telefono','codigo_socio'];

    public function cuentabancaria() {
        return $this->hasMany('App\CuentaBancaria');
    }

    public function facturacompra() {
        return $this->hasMany('App\Facturacompra');
    }
}
