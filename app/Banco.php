<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $table = "bancos";

    protected $fillable = ['id','nombre'];


   public function cuentabancaria() {
        return $this->hasOne('App\CuentaBancaria');
    }
    
}
