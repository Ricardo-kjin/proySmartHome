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
        Schema::create('horarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_horario');
            $table->time('hora');
            $table->text('descripcion');
            $table->string('estado');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('dispositivo_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('dispositivo_id')->references('id')->on('dispositivos')->onDelete('cascade');

            // Si deseas añadir más campos, hazlo aquí
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
