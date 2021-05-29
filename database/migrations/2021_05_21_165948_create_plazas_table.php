<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlazasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plazas', function (Blueprint $table) {
            $table->bigInteger("idplaza")->autoIncrement()->unsigned();
            $table->integer("capacidad");
            $table->dateTime("inicio");
            $table->dateTime("final");
            $table->boolean("expirada")->default('0');
            $table->bigInteger("empresa_idempresa")->unsigned();
            $table->foreign("empresa_idempresa")->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plazas');
    }
}
