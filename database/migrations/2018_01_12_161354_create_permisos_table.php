<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rol_id')->unsigned()->nullable();
            $table->integer('facturar')->default('0');
            $table->integer('cuenta_crear')->default('0');
            $table->integer('cuenta_editar')->default('0');
            $table->integer('cuenta_borrar')->default('0');
            $table->integer('cliente_crear')->default('0');
            $table->integer('cliente_editar')->default('0');
            $table->integer('cliente_borrar')->default('0');
            $table->integer('banco_crear')->default('0');
            $table->integer('banco_editar')->default('0');
            $table->integer('banco_borrar')->default('0');
            $table->integer('factura_pendiente_ver')->default('0');
            $table->integer('factura_pendiente_procesos')->default('0');
            $table->integer('factura_rechazada_ver')->default('0');
            $table->integer('factura_rechazada_procesos')->default('0');
            $table->integer('factura_aprobada_ver')->default('0');
            $table->integer('factura_aprobada_procesos')->default('0');
            $table->integer('movimientos_diario')->default('0');
            $table->integer('movimientos_estadistica')->default('0');

            $table->timestamps();

            $table->foreign('rol_id')->references('id')->on('roles')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permisos');
    }
}
