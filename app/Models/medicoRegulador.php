<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicoRegulador extends Model
{
    use HasFactory;
    protected $table="regulador";
    protected $fillable = [
      'id_paciente',
      'obs',
      'avfinal',
      'login',
      ];
}



 