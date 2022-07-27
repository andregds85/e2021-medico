<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class categoriaMapas extends Controller
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
