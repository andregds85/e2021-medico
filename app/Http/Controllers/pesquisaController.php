<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pacientes;
use App\Models\incluir_mapa_p2;


class pesquisaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:medicoRegulador-list|medicoRegulador-create|medicoRegulador-edit|medicoRegulador-delete', ['only' => ['index','show']]);
         $this->middleware('permission:medicoRegulador-create', ['only' => ['create','store']]);
         $this->middleware('permission:medicoRegulador-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:medicoRegulador-delete', ['only' => ['destroy']]);
    }
 
    public function index()
    {
        return view('IncluirMapaP2s.pesquisa');
    }

    public function pesquisa($p_nome){
        $produtos = DB::table('checklist')
                ->where('nome', 'like',  "%" .$p_nome)
                ->get();
        return view('checklistadm.pesquisa');
    }


    
    
    
}
