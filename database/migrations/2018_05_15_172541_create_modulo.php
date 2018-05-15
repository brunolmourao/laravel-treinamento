<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        if(!Schema::hasTable('modulo')){
            Schema::create('modulo', function (Blueprint $table) {
                $table->increments('idmodulo');
                $table->unsignedInteger('idtreinamento');
                $table->string('nomemodulo');
                $table->string('sumario');
                $table->binary('ementa');
                $table->string('instrutor');
                $table->decimal('cargahoraria');
                $table->timestamps();
            });

            Schema::table('modulo', function($table) {
                $table->foreign('idtreinamento')->references('idtreinamento')->on('treinamento')->OnDelete('cascade');
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
        Schema::table('modulo', function (Blueprint $table) {
            $table->dropForeign(['idtreinamento']);
        });
        Schema::dropIfExists('modulo');
    }
}
