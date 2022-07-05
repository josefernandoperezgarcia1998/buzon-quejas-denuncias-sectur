<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuzonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buzons', function (Blueprint $table) {
            $table->id();
            $table->string('folio')->nullable();
            $table->string('nombre');
            $table->string('telefono');
            $table->string('email');
            $table->string('cargo_puesto');
            $table->string('fecha');
            $table->string('nombre_servidor_denuncia');
            $table->string('cargo_puesto_servidor_denuncia');
            $table->string('fecha_servidor_denuncia');
            $table->longText('mensaje_breve_servidor_denuncia');
            $table->string('nombre_testigo');
            $table->string('domicilio_testigo');
            $table->string('telefono_testigo');
            $table->string('email_testigo');
            $table->enum('trabajo_admon_publica', ['Si', 'No']);
            $table->string('entidad_dependencia_testigo')->nullable();
            $table->string('cargo_testigo')->nullable();
            $table->enum('estado', ['no_atendido', 'atendido', 'concluido', 'cancelado'])->default('no_atendido')->nullable();
            // $table->integer('area_id')->unsigned();
            // $table->integer('area_denunciado_id')->unsigned();
            // $table->foreign('area_id')->references('id')->on('areas');
            // $table->foreign('area_denunciado_id')->references('id')->on('areas');
            $table->unsignedBigInteger('area_id');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->unsignedBigInteger('area_denunciado_id');
            $table->foreign('area_denunciado_id')->references('id')->on('areas');
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
        Schema::dropIfExists('buzons');
    }
}
