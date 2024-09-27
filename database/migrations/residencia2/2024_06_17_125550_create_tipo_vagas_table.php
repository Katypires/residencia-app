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
        Schema::create('residencia.processo_tipo_vagas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('processo_vaga_id')->nullable();
            $table->foreign('processo_vaga_id')->references('id')->on('residencia.processo_vagas')->onUpdate('cascade')->onDelete('set null');

            $table->string('nome')->nullable();
            $table->boolean('status')->default(false);

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
        Schema::dropIfExists('residencia.processo_tipo_vagas');
    }
};
