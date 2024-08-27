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
        Schema::create('residencia.experiencias', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('candidato_id')->nullable();
            $table->foreign('candidato_id')->references('id')->on('residencia.candidatos')->onUpdate('cascade')->onDelete('cascade');

            $table->string('curso')->nullable();
            $table->string('cargo_funcao')->nullable();
            $table->string('area_atuacao')->nullable();
            $table->date('data_inicio')->nullable();
            $table->date('data_saida')->nullable();

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
        Schema::dropIfExists('residencia.experiencias');
    }
};
