<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreinamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        if(!Schema::hasTable('treinamento')){
            Schema::create('treinamento', function (Blueprint $table) {
                $table->increments('idtreinamento');
                $table->string('nometreinamento');
                $table->decimal('cargahoraria');
                $table->binary('objetivo');
                $table->string('realizador');
                $table->timestamps();
            });
        }    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treinamento');
    }
}
