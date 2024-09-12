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
        Schema::create('residencia.formacoes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('candidato_id')->nullable();
            $table->foreign('candidato_id')->references('id')->on('residencia.candidatos')->onUpdate('cascade')->onDelete('cascade');

            $table->enum('tipo_formacao', ['graduacao', 'especializacao', 'mestrado', 'doutorado'])->default('graduacao');
            $table->string('instituicao')->nullable();
            $table->string('curso')->nullable();
            $table->boolean('exterior')->default(false);
            $table->string('pais')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->enum('tipo_duracao', ['ano', 'semestre', 'meses'])->default('ano');
            $table->integer('duracao')->nullable();
            $table->date('data_conclusao')->nullable();
            $table->string('documento_pdf')->nullable();
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
        Schema::dropIfExists('residencia.formacoes');
    }
};
