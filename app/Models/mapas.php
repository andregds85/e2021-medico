<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mapas extends Model
{
    use HasFactory;
    protected $table="mapas";
    protected $fillable = [
        'macro',
        'categoria_id',
        'nome',
        'descricao',
        'especialidade',
        'cod_procedimento',
        'procedimento',
        'vagas',
        'passo1',
        'login',
        'cpf',

      ];
}
