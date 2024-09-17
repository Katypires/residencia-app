<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residencia.formularios', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('candidato_id')->nullable();
            $table->foreign('candidato_id')->references('id')->on('residencia.candidatos')->onUpdate('cascade')->onDelete('set null');

            // $table->foreignId('user_id')->constrained('users');
            $table->string('tipo_inscricao')->nullable();
            $table->string('nome')->nullable();
            $table->string('nome_social')->nullable();
            $table->string('cpf')->nullable();
            $table->string('celular')->nullable();
            $table->string('email')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('rg')->nullable();
            $table->string('orgao_expedidor')->nullable();
            $table->date('expedicao_rg')->nullable();
            $table->integer('crm')->nullable();
            $table->string('crm_estado')->nullable();  
            $table->string('sexo')->nullable();  
            $table->string('pais_naturalidade')->nullable();  
            $table->string('estado_civil')->nullable();  
            $table->string('cep')->nullable();  
            $table->string('cidade')->nullable();  
            $table->string('estado')->nullable();  
            $table->string('endereco')->nullable();  
            $table->string('bairro')->nullable();  
            $table->integer('numero')->nullable();  
            $table->string('complemento')->nullable();  
            $table->string('instituicao_graduacao')->nullable();  
            $table->string('ano_conclusao')->nullable();  
            $table->string('cidade_instituicao')->nullable();
            $table->string('estado_instituicao')->nullable();
            $table->string('ocupacao_profissao')->nullable();
            $table->string('curriculo')->nullable();
            $table->boolean('provab')->nullable();
            $table->string('tipo_vaga')->nullable();
            $table->boolean('leitura_edital')->default(false);
            $table->boolean('termo_aceitacao')->default(false); 
            $table->boolean('solicitacao_isencao')->default(false); 
            $table->string('documento_ampla_concorrencia')->nullable();
            $table->string('documento_solicitacao_isencao')->nullable();
            $table->string('documento_provab')->nullable();
            $table->string('key')->nullable()->unique();//candidato + processo

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
        Schema::dropIfExists('residencia.formularios');
    }
}
