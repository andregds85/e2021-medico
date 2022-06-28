<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
  
    function __construct()
    {
         $this->middleware('permission:administrador-list|administrador-create|administrador-edit|administrador-delete', ['only' => ['index','show']]);
         $this->middleware('permission:administrador-create', ['only' => ['create','store']]);
         $this->middleware('permission:administrador-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:administrador-delete', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $categorias = Categoria::latest()->paginate(5);
        return view('categorias.index',compact('categorias'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    public function create()
    {
        return view('categorias.create');
    }
    
  
    
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'cnes' => 'required',
            'macro' => 'required',

        ]);
        Categoria::create($request->all());
        return redirect()->route('categorias.index')
                        ->with('Sucesso','Categoria criada com  Sucesso.');
    }
    public function show(Categoria $categoria)
    {
        return view('categorias.show',compact('categoria'));
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit',compact('categoria'));
    }

     public function update(Request $request, Categoria $categoria)
    {
         request()->validate([
            'name' => 'required',
            'cnes' => 'required',
            'macro' => 'required',

        ]);

        $categoria->update($request->all());
        return redirect()->route('categorias.index')
                        ->with('Sucesso','Categorias Atualizada com Sucesso');
    }

      public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')
                        ->with('Sucesso','Categoria deletada com Sucesso');
    }

    
}

