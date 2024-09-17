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

            $table->unsignedBigInteger('processo_id')->nullable();
            $table->foreign('processo_id')->references('id')->on('residencia.processos')->onUpdate('cascade')->onDelete('set null');

            $table->unsignedBigInteger('processo_vaga_id')->nullable();
            $table->foreign('processo_vaga_id')->references('id')->on('residencia.processo_vagas')->onUpdate('cascade')->onDelete('set null');

            $table->unsignedBigInteger('processo_tipo_vaga_id')->nullable();
            $table->foreign('processo_tipo_vaga_id')->references('id')->on('residencia.processo_tipo_vagas')->onUpdate('cascade')->onDelete('set null');
            // $table->foreignId('user_id')->constrained('users');
           
            $table->string('tipo_vaga')->nullable();
            $table->boolean('leitura_edital')->default(false);
            $table->boolean('termo_aceitacao')->default(false); 
            $table->boolean('solicitacao_isencao')->default(false); 
            $table->string('documento_ampla_concorrencia')->nullable();
            $table->string('documento_solicitacao_isencao')->nullable();
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
