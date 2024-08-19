<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoProcessosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residencia.tipo_processos', function (Blueprint $table) {
            $table->id();

            $table->string('nome')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->boolean('residencia_familia_comunidade')->default(true);
            $table->boolean('residencia_psiquiatria')->default(false);
            $table->boolean('residencia_multiprofissional_saude_familia')->default(true);
            $table->boolean('residencia_multiprofissional_saude_mental')->default(false);
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
        Schema::dropIfExists('residencia.tipo_processos');
    }
}
