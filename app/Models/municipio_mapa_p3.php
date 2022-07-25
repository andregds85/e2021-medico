<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class municipio_mapa_p3 extends Model
{
    use HasFactory;
    protected $table="mapamunicipiop3";
    protected $fillable = [
        'idp2',
        'observacao',
        'usuarioSistema',
         ];
}

