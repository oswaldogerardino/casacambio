<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfiguracionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuracion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_empresa',100)->default('CasaCambio');
            $table->string('slogan',100)->default('Rapidez y Eficiencia');
            $table->string('codigo_empresa')->default('COD-CASACAMBIO');
            $table->binary('logo')->nullable();
            $table->double('valor_moneda')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configuracion');
    }
}
