<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurmaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('historico')){
            Schema::create('turma', function (Blueprint $table) {
                $table->increments('idturma');
                $table->string('turma');
                $table->date('dateInicio');
                $table->date('dateFim');
                $table->foreign('idtreinamento')->references('idtreinamento')->on('treinamento');
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
        Schema::dropIfExists('turma');
    }
}
