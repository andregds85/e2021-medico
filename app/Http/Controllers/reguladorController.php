<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\regulador;
use Illuminate\Http\Request;

class reguladorController extends Controller
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
    
    }

    public function create(){
    
    
    }

   public function store(Request $request)
   {
    request()->validate([
    ]);

            regulador::create($request->all());
            return redirect()->route('/')
                            ->with('Sucesso','Registro Criado com Sucesso.');

         }
   }


   