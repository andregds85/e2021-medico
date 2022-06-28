<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class incluir_mapa_p2 extends Model
{
    use HasFactory;
    protected $table="incluir_mapa_p2s";
    protected $fillable = [
        'idMapa',
        'idPaciente',
        'macro',
      ];
}



 