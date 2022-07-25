<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipioTable extends Migration
{
    public function up()
    {
        Schema::create('nunicipio', function (Blueprint $table) {
            $table->id();
            $table->string('idIncMapa');
            $table->string('obsMuni');
            $table->string('login');
            $table->string('cpf');
            $table->string('macro');
            $table->timestamps();
        });
    }

        public function down()
        {
         Schema::dropIfExists('municipio');
        }

        

}
