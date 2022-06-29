<?php

namespace App\Http\Controllers;

use App\Models\mapas;
use App\Models\finalMaps;


use Illuminate\Http\Request;

class listarMapaController extends Controller
{


    function __construct()
    {
         $this->middleware('permission:medicoRegulador-list|medicoRegulador-create|medicoRegulador-edit|medicoRegulador-delete', ['only' => ['index','show']]);
         $this->middleware('permission:medicoRegulador-create', ['only' => ['create','store']]);
         $this->middleware('permission:medicoRegulador-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:medicoRegulador-delete', ['only' => ['destroy']]);
    }


        public function show($id){
         
            return view('fullmap.index',['id'=>$id]);
       
        }

        
}
