<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscricaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residencia.inscricoes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('processo_id')->nullable();
            $table->foreign('processo_id')->references('id')->on('residencia.processos')->onUpdate('cascade')->onDelete('set null');

            $table->unsignedBigInteger('candidato_id')->nullable();
            $table->foreign('candidato_id')->references('id')->on('residencia.candidatos')->onUpdate('cascade')->onDelete('set null');

            $table->unsignedBigInteger('formulario_id')->nullable();
            $table->foreign('formulario_id')->references('id')->on('residencia.formularios')->onUpdate('cascade')->onDelete('set null');

            $table->boolean('boleto')->default(false);
            $table->boolean('pagamento')->default(false);
            $table->string('key')->nullable()->unique();
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
        Schema::dropIfExists('residencia.inscricoes');
    }
}
