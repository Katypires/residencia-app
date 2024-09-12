<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residencia.candidatos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->string('nome')->nullable();
            $table->string('nome_social')->nullable();
            $table->string('celular')->nullable();
            $table->string('email')->nullable();
            $table->string('cpf')->nullable();
            $table->string('sexo')->nullable();  
            $table->string('rg')->nullable();
            $table->string('orgao_expedidor')->nullable();
            $table->date('expedicao_rg')->nullable();
            $table->string('pais_naturalidade')->nullable();  
            $table->string('estado_civil')->nullable();  
            $table->string('cep')->nullable();  
            $table->string('cidade')->nullable();  
            $table->string('estado')->nullable();  
            $table->string('endereco')->nullable();  
            $table->string('bairro')->nullable();  
            $table->integer('numero')->nullable();  
            $table->string('complemento')->nullable();
            $table->string('curriculo_lattes')->nullable();  
            $table->string('conselho')->nullable();
            // $table->enum('tipo_formacao', ['graduacao', 'especializacao', 'mestrado', 'doutorado'])->default('graduacao');  
            $table->string('curso')->nullable();
            $table->string('instituicao')->nullable();
            $table->string('pais_curso')->nullable();
            $table->string('cidade_curso')->nullable();
            $table->string('estado_curso')->nullable();
            $table->boolean('exterior')->default(false);
            $table->boolean('status')->nullable();

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
        Schema::dropIfExists('residencia.candidatos');
    }
}
