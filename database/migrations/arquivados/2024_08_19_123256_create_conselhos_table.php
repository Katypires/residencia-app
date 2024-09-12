<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residencia.conselhos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('tipo_conselho_id')->nullable();
            $table->foreign('tipo_conselho_id')->references('id')->on('residencia.tipo_conselhos')->onUpdate('cascade')->onDelete('set null');

            $table->string('numero');
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
        Schema::dropIfExists('residencia.conselhos');
    }
};
