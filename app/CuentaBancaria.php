<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuentaBancaria extends Model
{
    protected $table = "cuentasbancarias";

    protected $fillable = ['id','cuenta','tipo_cuenta','banco_id','socio_id','status'];

    public function c_socios() {
        dd($this->belongsTo('App\Socio')) ;
    }

    public function c_bancos() {
        return $this->belongsTo('App\Banco');
    }

}
