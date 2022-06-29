<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportUsers;
use App\Imports\ImportUsers;
use Maatwebsite\Excel\Facades\Excel;

class Import_Export_Controller extends Controller
{
    function __construct()
    {
         $this->middleware('permission:medicoRegulador-list|medicoRegulador-create|medicoRegulador-edit|medicoRegulador-delete', ['only' => ['index','show']]);
         $this->middleware('permission:medicoRegulador-create', ['only' => ['create','store']]);
         $this->middleware('permission:medicoRegulador-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:medicoRegulador-delete', ['only' => ['destroy']]);
    }
    
    
    public function importExport()
    {
       return view('import');
    }
    public function export()
    {
        return Excel::download(new ExportUsers, 'users.xlsx');
    }

    public function import()
    {
        Excel::import(new ImportUsers, request()->file('file'));
        return back();
    }
}
