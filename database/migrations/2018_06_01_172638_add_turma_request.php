<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTurmaRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('turmarequest', function (Blueprint $table) {
            $table->increments('idturmarequest');
            $table->unsignedInteger('idpessoas');
            $table->unsignedInteger('idturma');
            $table->timestamps();

        });
        Schema::table('turmarequest', function($table) {
                $table->foreign('idpessoas')->references('idpessoas')->on('pessoas')->OnDelete('cascade');
                $table->foreign('idturma')->references('idturma')->on('turma')->OnDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('turmarequest', function (Blueprint $table) {
            $table->dropForeign(['idpessoas']);
            $table->dropForeign(['idturma']);
        });
        Schema::dropIfExists('turmarequest');
    }
}
