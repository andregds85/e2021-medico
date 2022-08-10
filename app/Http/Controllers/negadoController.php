<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\medicoRegulador;
use App\Models\regulador;

class negadoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:medicoRegulador-list|medicoRegulador-create|medicoRegulador-edit|medicoRegulador-delete', ['only' => ['index','show','__invoke']]);
         $this->middleware('permission:medicoRegulador-create', ['only' => ['create','store']]);
         $this->middleware('permission:medicoRegulador-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:medicoRegulador-delete', ['only' => ['destroy']]);
    }
     public function index()
    {
     return view('avFinal.negado');
    }
  




    
}





