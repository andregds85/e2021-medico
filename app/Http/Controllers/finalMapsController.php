<?php

namespace App\Http\Controllers;

use App\Models\finalMaps;
use Illuminate\Http\Request;

class finalMapsController extends Controller
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
        /*
        $mapas = mapas::latest()->paginate(5);
        return view('mapas.index',compact('mapas'))
            ->with('i', (request()->input('page', 1) - 1) * 5); */
    }


     public function store(Request $request)
    {   
        request()->validate([

        ]);

        finalMaps::create($request->all());
            echo  "<script> alert( 'Sucesso, Cadastro inserido !' ); </script>";  
              return redirect()->route('home')
                        ->with('Sucesso','criado com  Sucesso.');
    
    }

      public function show($id){ 

        return view('finalM.vizualiza',['id'=>$id]); 
        
       }
   
   
}

