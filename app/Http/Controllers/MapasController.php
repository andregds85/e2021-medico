<?php

namespace App\Http\Controllers;

use App\Models\mapas;
use Illuminate\Http\Request;

class MapasController extends Controller
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
        $mapas = mapas::latest()->paginate(5);
        return view('mapas.index',compact('mapas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

     public function store(Request $request)
    {
        request()->validate([

        ]);
        mapas::create($request->all());
        return redirect()->route('mapas.index')
                        ->with('Sucesso','Mapa criado com  Sucesso.');
    }

    public function show($id){
        return view('mapas.vizualiza',['id'=>$id]);
       }
   


       public function edit(mapas $mapa)
    {
        return view('mapas.edit',compact('mapas'));
    }

     public function update(Request $request, mapas $mapa)
    {
         request()->validate([

   ]);

        $mapa->update($request->all());
        return redirect()->route('mapas.index')
                        ->with('Sucesso','mapas Atualizada com Sucesso');
    }

    public function destroy(mapas $mapa)
    {
        $mapa->delete();
        return redirect()->route('mapas.index')
                        ->with('Sucesso','mapas deletada com Sucesso');
    }
    
}