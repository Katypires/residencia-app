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
        Schema::create('residencia.processo_contatos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('processo_id')->nullable();
            $table->foreign('processo_id')->references('id')->on('residencia.processos')->onUpdate('cascade')->onDelete('cascade');

            $table->string('nome')->nullable();
            $table->text('descricao')->nullable();

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
        Schema::dropIfExists('residencia.processo_contatos');
    }
};
