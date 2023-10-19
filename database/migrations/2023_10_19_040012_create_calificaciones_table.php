<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id();
            $table->float('calificacion');
            $table->unsignedBigInteger('id_materia');
            $table->unsignedBigInteger('id_alumno');
            //Establecemos las llaves foráneas a las tablas materias y alumnos y añadimos la eliminación de
            //relaciones existentes en la tabla calificaciones si se borra el alumno o la materia relacionado
            $table->foreign('id_materia')->references('id')->on('materias')->onDelete('cascade');
            $table->foreign('id_alumno')->references('id')->on('alumnos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calificaciones');
    }
};
