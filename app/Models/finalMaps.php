<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class finalMaps extends Model
{
    use HasFactory;
    protected $table="finalmaps";
    protected $fillable = [
        'idp4',
        'obsCentral',
        'statusSisreg',
        'codSisReg',
        'cns',
        'idMapa',
        'idPaciente',
        ];
}

