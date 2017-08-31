<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Setupbd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->char('idUsuario',6);
            $table->string('Nombre');
            $table->string('Telefono');
            $table->string('Direccion');
            $table->string('Usuario');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

    }

    public function down()
    {
        //
    }
}
