<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncluirMapaP2sTable extends Migration
{
  
    public function up()
    {
        Schema::create('incluir_mapa_p2s', function (Blueprint $table) {
            $table->id();
            $table->string('idMapa');
            $table->string('idPaciente');
            $table->string('codSolicitacao');
            $table->text('cns');
            $table->string('nomeUsuario');
            $table->string('municipio');
            $table->string('usuarioSistema');
            $table->string('cpfUsuarioSistema');
            $table->string('macro');
            $table->timestamps();
        });
    }

       public function down()
    {
        Schema::dropIfExists('incluir_mapa_p2s');
    }
}
