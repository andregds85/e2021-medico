<?php

namespace App\Http\Controllers;

use App\Models\mapas;
use App\Models\finalMaps;


use Illuminate\Http\Request;

class listarMapaController extends Controller
{


    function __construct()
    {
         $this->middleware('permission:regulacao-list|regulacao-create|regulacao-edit|regulacao-delete', ['only' => ['index','show','__invoke']]);
         $this->middleware('permission:regulacao-create', ['only' => ['create','store']]);
         $this->middleware('permission:regulacao-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:regulacao-delete', ['only' => ['destroy']]);
    }


        public function show($id){
         
            return view('fullmap.index',['id'=>$id]);
       
        }

        
}
