<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        if(!Schema::hasTable('historico')){
            Schema::create('historico', function (Blueprint $table) {
                $table->increments('idhistorico');
                $table->integer('faltas');
                $table->decimal('nota');
                $table->char('aprovado',1);
                $table->unsignedInteger('idpessoas');
                $table->unsignedInteger('idturma');
                $table->timestamps();
            });
            Schema::table('historico', function($table) {
                $table->foreign('idpessoas')->references('idpessoas')->on('pessoas')->OnDelete('cascade');
                $table->foreign('idturma')->references('idturma')->on('turma')->OnDelete('cascade');
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
        Schema::table('historico', function (Blueprint $table) {
            $table->dropForeign(['idturma']);
            $table->dropForeign(['idpessoas']);
        });
        Schema::dropIfExists('historico');
        
    }
}
