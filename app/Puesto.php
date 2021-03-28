<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    //
    protected $table = "puestos";

    protected $fillable = ['id', 'nombre', 'status'];

    public function usuario() {
        return $this->hasMany('App\Usuario');
    }

}
