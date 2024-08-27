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
        Schema::create('residencia.cedentes', function (Blueprint $table) {
            $table->id();

            $table->string('nome')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('endereco')->nullable();
            $table->string('banco')->nullable();
            $table->string('agencia')->nullable();
            $table->string('conta_corrente')->nullable();
            $table->string('numero_convenio')->nullable();
            $table->string('nosso_numero')->nullable();

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
        Schema::dropIfExists('residencia.cedentes');
    }
};
