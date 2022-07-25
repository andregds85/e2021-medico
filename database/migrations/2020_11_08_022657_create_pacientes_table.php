<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
   
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categorias_id');
            $table->string('macro');
            $table->string('solicitacao');
            $table->string('cns');
            $table->string('nomedousuario');
            $table->string('municipio');
            $table->string('datasolicitacao');
            $table->string('unidadedesejada');
            $table->string('codigo');
            $table->text('observacao1')->nullable();
            $table->text('observacao2')->nullable();
            $table->text('observacao3')->nullable();
            $table->text('observacao4')->nullable();
            $table->text('observacao5')->nullable();
            $table->string('statusSolicitacao')->nullable();
            $table->boolean('vizualizacao')->nullable();
            $table->timestamps();
        });      
        
        Schema::table('pacientes', function (Blueprint $table) {
            $table->foreign('categorias_id')->references('id')->on('categorias');
        });
    }
      public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
