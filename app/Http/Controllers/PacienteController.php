<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoriaController;

class PacienteController extends Controller
{
  
    function __construct()
    {
         $this->middleware('permission:regulacao-list|regulacao-create|regulacao-edit|regulacao-delete', ['only' => ['index','show']]);
         $this->middleware('permission:regulacao-create', ['only' => ['create','store']]);
         $this->middleware('permission:regulacao-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:regulacao-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
         $pacientes = Pacientes::orderby('id', 'asc')->paginate();
         return view('pacientes.index',compact('pacientes'));
    }
    public function create()
    {
        return view('pacientes.create');
    }
    public function hospital()
    {
        return view('pacientes.hospital',compact('paciente'));
    }
    public function store(Request $request)
    {
        request()->validate([
            'categorias_id' => 'required',
            'macro' => 'required',
            'solicitacao' => 'required',
            'cns' => 'required',
            'nomedousuario' => 'required',
            'municipio' => 'required',
            'datasolicitacao' =>'required',
            'unidadedesejada' => 'required',
            'codigo' => 'required',
        ]);

        Pacientes::create($request->all());
        return redirect()->route('pacientes.index')
                        ->with('Sucesso','Paciente Criado com Sucesso.');
    }

    public function show(Pacientes $paciente)
    {
   
        return view('pacientes.show',compact('paciente'));
    
    }

     public function edit(Pacientes $paciente)
    {
   
        return view('pacientes.edit',compact('paciente'));
   
    }

     public function update(Request $request, Pacientes $paciente)
    {
         request()->validate([
            'categorias_id' => 'required',
            'solicitacao' => 'required',
            'cns' => 'required',
            'nomedousuario' => 'required',
            'municipio' => 'required',
            'datasolicitacao' =>'required',
            'unidadedesejada' => 'required',
            'codigo' => 'required',
           ]);
           
    $paciente->update($request->all());
    return redirect()->route('pacientes.index')
                        ->with('Sucesso','Paciente Atualizado com Sucesso');
    }
  
     public function destroy(Pacientes $paciente)
    {
        $paciente->delete();
        return redirect()->route('pacientes.index')
                        ->with('Sucesso','Paciente Deletado com Sucesso');
    }
}
