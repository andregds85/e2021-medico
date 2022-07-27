<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\macro;


class MacroController extends Controller
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
       
    $macros = Macro::orderby('id', 'asc')->paginate();
    return view('macros.index',compact('macros'));
    }
    

    public function create()
    {
        return view('macros.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'nome' => 'required',
        ]);

        Macro::create($request->all());
        return redirect()->route('macros.index')
                        ->with('Sucesso','macro criada com  Sucesso.');
    }

      public function show()
    {

    }

    public function edit(Macro $macros)
    {
        return view('macros.edit',compact('macros'));
    }

    public function update(Request $request, Macro $macros)
    {
         request()->validate([
            'nome' => 'required',
        ]);

        $macros->update($request->all());

        return redirect()->route('macros.index')
                        ->with('Sucesso','Macro Atualizada com Sucesso');
    }

    public function destroy(Macro $macros)
    {
        $macros->delete();
        return redirect()->route('macros.index')
                        ->with('Sucesso','macro deletada com Sucesso');
    }

    



}
