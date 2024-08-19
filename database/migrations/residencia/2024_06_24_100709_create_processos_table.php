<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residencia.processos', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('tipo_processo_id')->nullable();
            $table->foreign('tipo_processo_id')->references('id')->on('residencia.tipo_processos')->onUpdate('cascade')->onDelete('set null');

            $table->string('nome')->nullable();
            $table->string('descricao')->nullable();
            $table->integer('valor')->nullable();
            $table->string('imagem')->nullable();
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
        Schema::dropIfExists('residencia.processos');
    }
}
