<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
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
       return view('municipio.index');
    }

    public function show($id){
       return view('municipio.mapasFull',['id'=>$id]); 
     }

    public function create(){
      return view('municipio.create'); 
    }

   public function store(Request $request)
   {
       request()->validate([
           'idIncMapa' => 'required',
           'obsMuni' => 'required',
           'login' => 'required',
           'cpf' => 'required',
           'macro' => 'required',
            ]);

            municipio::create($request->all());
            return redirect()->route('municipio.index')
                            ->with('Sucesso','Observação do Municipio Criada com Sucesso.');

         }
    
}


