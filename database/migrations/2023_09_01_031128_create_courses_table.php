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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('periodo')->nullable();
            $table->date('fecha_alta')->nullable();
            $table->integer('horas')->nullable();
            $table->string('tipohs');
            $table->string('modalidad');
            $table->string('logo')->nullable();
            $table->string('objetivo')->nullable();
            $table->string('contenido')->nullable();
            $table->char('planilla_id')->nullable();
            $table->integer('nota_final_aprobado')->nullable();
            $table->integer('nota_modulo_aprobado')->nullable();
            $table->string('resultado');
            $table->tinyInteger('activo')->nullable();


            $table->timestamps();

            $table->foreignId('resolution_id')
                ->references('id')
                ->on('resolutions')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
