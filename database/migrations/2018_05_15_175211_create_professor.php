<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        if(!Schema::hasTable('professor')){
            Schema::create('professor', function (Blueprint $table) {
                $table->increments('idprofessor');
                $table->unsignedInteger('idpessoas');
                $table->unsignedInteger('idmodulo');
                $table->timestamps();
            });
            Schema::table('professor', function($table) {
                $table->foreign('idpessoas')->references('idpessoas')->on('pessoas')->OnDelete('cascade');
                $table->foreign('idmodulo')->references('idmodulo')->on('modulo')->OnDelete('cascade');
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
        Schema::table('professor', function (Blueprint $table) {
            $table->dropForeign(['idpessoas']);
            $table->dropForeign(['idmodulo']);
        });
        Schema::dropIfExists('professor');
        
    }
}
