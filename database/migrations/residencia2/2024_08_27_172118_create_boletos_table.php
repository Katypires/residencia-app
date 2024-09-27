<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoletosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residencia.boletos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('inscricao_id')->nullable();
            $table->foreign('inscricao_id')->references('id')->on('residencia.inscricoes')->onUpdate('cascade')->onDelete('set null');
            $table->string('numero_titulo_cliente')->nullable(); //codigoDinamicoDoBanco
            $table->jsonb('corpo')->nullable();
            $table->jsonb('boleto')->nullable();

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
        Schema::dropIfExists('residencia.boletos');
    }
}
