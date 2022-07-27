<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\incluir_mapa_p2;
use App\Models\Pacientes;


class IncluirMapaP2sController extends Controller
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
        return view('IncluirMapaP2s.index');
    }
 
    public function create()
    {
        return view('IncluirMapaP2s.create');
    }
     public function store(Request $request)
    {
            request()->validate([
       
        ]);
 
       incluir_mapa_p2::create($request->all());
       Pacientes::where('id','idPaciente')->update(['statusSolicitacao' => 'S']);   
       return redirect()->route('retirapaciente.index')
                        ->with('Sucesso','Paciente Incluido no Mapa com Sucesso.');

                       
    }
    
}



