<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturacomprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturacompras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_depositante',50)->nullable();
            $table->string('cedula_depositante',50)->nullable();
            $table->string('telefono_depositante',50)->nullable();
            $table->integer('cuenta_cliente')->unsigned()->nullable();
            $table->integer('socio_id')->unsigned()->nullable();
            $table->integer('puesto_id')->unsigned()->nullable();
            $table->string('comision',50);
            $table->string('n_factura',50);
            $table->double('cantidad_pesos');
            $table->double('valor_moneda')->default('1');
            $table->double('transferencia')->nullable();
            $table->char('status', 1)->default('1');
            $table->date('fecha_facturacion');
            $table->string('imagen',50)->nullable();
            $table->string('comentario',250)->nullable();

            $table->foreign('socio_id')->references('id')->on('socios');
            $table->foreign('cuenta_cliente')->references('id')->on('cuentasbancarias')->onDelete('set null');
            $table->foreign('puesto_id')->references('id')->on('puestos')->onDelete('set null');

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
        Schema::dropIfExists('facturacompra');
    }
}
