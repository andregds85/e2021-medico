<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Paciente;
use App\Models\User;
use Illuminate\Http\Request;


class soudohospital extends Controller
{
   

    function __construct()
    {
         $this->middleware('permission:medicoRegulador-list|medicoRegulador-create|medicoRegulador-edit|medicoRegulador-delete', ['only' => ['index','show','__invoke']]);
         $this->middleware('permission:medicoRegulador-create', ['only' => ['create','store']]);
         $this->middleware('permission:medicoRegulador-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:medicoRegulador-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
   
    {   
     return view('soudohospital.index');
    }

    
    public function create()
    {

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
