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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('rol');
            $table->date('fecha_alta');
            $table->date('usuario_alta');
            $table->string('cuv')->nullable();;
            $table->string('certificado_estado');
            $table->date('certificado_fecha_envio')->nullable();;
            $table->date('certificado_fecha_reenvio')->nullable();;
            $table->string('certificado_usuario_reenvio')->nullable();;
            $table->integer('nota')->nullable();

            $table->timestamps();

            $table->foreignId('id_person')
            ->references('id')
            ->on('people')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('id_course')
            ->references('id')
            ->on('courses')
            ->onUpdate('cascade')
            ->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
