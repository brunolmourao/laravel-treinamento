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
        Schema::create('historico', function (Blueprint $table) {
            $table->increments('idhistorico');
            $table->integer('faltas');
            $table->decimal('nota');
            $table->char('aprovado',1);
            $table->foreign('idpessoas')->references('idpessoas')->on('pessoas');
            $table->foreign('idturma')->references('idturma')->on('turma');
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
        Schema::dropIfExists('historico');
    }
}
