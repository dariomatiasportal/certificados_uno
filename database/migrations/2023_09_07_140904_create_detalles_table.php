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
        Schema::create('detalles', function (Blueprint $table) {
            $table->id();
            $table->integer('nota');

            $table->timestamps();

            $table->foreignId('module_id')
            ->references('id')
            ->on('modules')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('certificate_id')
            ->references('id')
            ->on('certificates')
            ->onUpdate('cascade')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles');
    }
};
