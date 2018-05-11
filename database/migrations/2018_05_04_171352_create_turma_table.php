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
        Schema::enableForeignKeyConstraints();
        if(!Schema::hasTable('turma')){
            Schema::create('turma', function (Blueprint $table) {
                $table->increments('idturma');
                $table->string('turma');
                $table->date('dateInicio');
                $table->date('dateFim');
                $table->unsignedInteger('idtreinamento');
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
