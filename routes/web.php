<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\soudohospital;
use App\Http\Controllers\MapasController;
use App\Http\Controllers\MacroController;
use App\Http\Controllers\ManualController;
use App\Http\Controllers\macro;
use App\Http\Controllers\mapasRegController;
use App\Http\Controllers\IncluirMapaP2sController;
use App\Http\Controllers\contarController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\MedicoReguladorController;
use App\Http\Controllers\obsMapaP2sController;
use App\Http\Controllers\FinalizandoMapaController;
use App\Http\Controllers\retiraPacienteController;
use App\Http\Controllers\finalMapsController;
use App\Http\Controllers\encerraController;
use App\Http\Controllers\listarMapaController;
use App\Http\Controllers\pesquisaController;
use App\Http\Controllers\pesquisaHospSigController;
use App\Http\Controllers\sairController;
use App\Http\Controllers\pesquisaHospSig2Controller;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('macros', MacroController::class);
    Route::resource('pacientes', PacienteController::class);
    Route::resource('hospital', HospitalController::class);
    Route::resource('soudohospital', soudohospital::class);
    Route::resource('mapas', MapasController::class);
    Route::resource('manual', ManualController::class);
    Route::resource('macro', macro::class);
    Route::resource('mapasReg', mapasRegController::class);
    Route::resource('incluirMapaP2s', IncluirMapaP2sController::class);
    Route::resource('continua', mapasRegController::class);
    Route::resource('vizualiza', mapasRegController::class);
    Route::resource('contar', contarController::class);
    Route::resource('excluir', contarController::class);
    Route::resource('municipio', MunicipioController::class);
    Route::resource('regulador', MedicoReguladorController::class);
    Route::resource('observacao', obsMapaP2sController::class);
    Route::resource('finalizando', FinalizandoMapaController::class);
    Route::resource('retirapaciente', retiraPacienteController::class);
    Route::resource('final', finalMapsController::class);
    Route::resource('confirma', encerraController::class);
    Route::resource('listar', listarMapaController::class);
    Route::resource('pesquisar', pesquisaController::class);
    Route::resource('sigtaphosp', pesquisaHospSigController::class);
    Route::resource('sair', sairController::class);
    Route::resource('sigtaphosp2', pesquisaHospSig2Controller::class);

      
    Route::get('munipac', 'App\Http\Controllers\MunicipioController@paciente');
    Route::get('excluir', 'App\Http\Controllers\contarController@show');
    Route::get('mapasfull', 'App\Http\Controllers\obsMapaP2sController@mapasFull');
  
    /* url chamando um methodo do Controller 
    Route::get('pacienteMapa', 'App\Http\Controllers\mapasRegController@abc');
    */
  
    Route::get('import_exportpacie', 'App\Http\Controllers\Import_Export_ControllerPacie@importExport');
    Route::post('importpacie', 'App\Http\Controllers\Import_Export_ControllerPacie@import');
    Route::get('exportpacie', 'App\Http\Controllers\Import_Export_ControllerPacie@export');

    Route::get('import_export', 'App\Http\Controllers\Import_Export_Controller@importExport');
    Route::post('import', 'App\Http\Controllers\Import_Export_Controller@import');
    Route::get('export', 'App\Http\Controllers\Import_Export_Controller@export');
 
});



