<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentasbancariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

         Schema::create('cuentasbancarias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cuenta',100);
            $table->integer('banco_id')->unsigned()->nullable();
            $table->string('tipo_cuenta', 20);
            $table->integer('socio_id')->unsigned()->nullable();;
            $table->char('status', 1)->default('1');
            $table->timestamps();

            $table->foreign('socio_id')->references('id')->on('socios')->onDelete('cascade');
            $table->foreign('banco_id')->references('id')->on('bancos')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cuentasbancarias');
    }
}
