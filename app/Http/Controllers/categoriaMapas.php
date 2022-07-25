<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class categoriaMapas extends Controller
{
   
    function __construct()
    {
         $this->middleware('permission:administrador-list|admin-create|administrador-edit|administrador-delete', ['only' => ['index','store']]);
         $this->middleware('permission:administrador-create', ['only' => ['administrador','store']]);
         $this->middleware('permission:administrador-edit', ['only' => ['administrador','update']]);
         $this->middleware('permission:administrador-delete', ['only' => ['destroy']]);
    }
    

    public function index()
    {
        $categorias = Categoria::latest()->paginate(5);
        return view('categoriasMapas.index',compact('categoriasMapas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('categoriasMapas.create');
    }
  
    public function store(Request $request)
   
    {
         
    }

     public function show($id)
    {
    }

    public function edit($id)
    {
        


    }

   
    public function update(Request $request, $id)
    {


    }


    public function destroy($id)
    {


    }
}
