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

            $table->unsignedBigInteger('cedente_id')->nullable();
            $table->foreign('cedente_id')->references('id')->on('residencia.cedentes')->onUpdate('cascade')->onDelete('set null');

            $table->string('nome')->nullable();
            $table->string('valor')->nullable();
            $table->string('descricao')->nullable();
            $table->date('data_inicio')->nullable();
            $table->date('data_final')->nullable();
            $table->date('data_vencimento')->nullable();
            $table->enum('situacao', ['andamento', 'encerrado', 'cancelado'])->default('andamento');
            $table->boolean('formacao')->default(false);
            $table->boolean('qualificacao')->default(false);
            $table->boolean('experiencia')->default(false);

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
