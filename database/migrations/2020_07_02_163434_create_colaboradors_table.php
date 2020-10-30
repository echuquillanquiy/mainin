<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColaboradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaboradors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('nombres');
            $table->string('apellidos');

            $table->string('categoria');

            $table->string('monto');

            $table->string('area');

            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id')->references('id')->on('departamentos');

            $table->unsignedBigInteger('provincia_id');
            $table->foreign('provincia_id')->references('id')->on('provincias');

            $table->unsignedBigInteger('distrito_id');
            $table->foreign('distrito_id')->references('id')->on('distritos');

            $table->string('ubigeo_cod');

            $table->string('puesto',50);
            $table->string('documento', 25);
            $table->string('ndocumento', 20)->unique();
            $table->date('fechanac');
            $table->string('telefono', 50);
            $table->string('direccion');
            $table->text('observaciones');
            $table->string('correo');
            $table->string('respirador');
            $table->string('zapatos');
            $table->integer('peso');
            $table->integer('talla');
            $table->decimal('imc', 5,2)->nullable();
            $table->string('diagnutricion')->nullable();
            $table->string('tallazapato',4);
            $table->string('tallapantalon',4);
            $table->string('tallacamisa',4);
            $table->string('sexo', 2);
            $table->string('sanguineo',3);
            $table->string('estadocivil',25);
            $table->string('hijos',4);
            $table->string('telemeergencia',9);
            $table->string('contacto',50);
            $table->string('tiempocasa',50);
            $table->string('instruccion', 50);
            $table->string('especialidad',50)->nullable();
            $table->string('cuentabancaria', 20);
            $table->string('banco', 50);
            $table->date('inicioinduccion')->nullable();
            $table->date('fininduccion')->nullable();
            $table->string('lugarinduccion', 25)->nullable();
            $table->text('comentarios');
            $table->string('medio', 50);
            $table->string('estado')->default('ACEPTADO');
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('colaboradors');
    }
}
