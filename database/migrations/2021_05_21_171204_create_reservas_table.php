<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->bigInteger("id")->autoIncrement()->unsigned();
            $table->integer("num_personas");
            $table->bigInteger("estado_idestado")->default('1')->unsigned();
            $table->foreign("estado_idestado")->references('idestado')->on('estados');
            $table->bigInteger("user_iduser")->unsigned();
            $table->foreign("user_iduser")->references('id')->on('users');
            $table->bigInteger("plaza_idplaza")->unsigned();
            $table->foreign("plaza_idplaza")->references('idplaza')->on('plazas');
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
        Schema::dropIfExists('reservas');
    }


}
