<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:municipio-list|municipio-create|municipio-edit|municipio-delete', ['only' => ['index','show','__invoke']]);
         $this->middleware('permission:municipio-create', ['only' => ['create','store']]);
         $this->middleware('permission:municipio-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:municipio-delete', ['only' => ['destroy']]);
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


