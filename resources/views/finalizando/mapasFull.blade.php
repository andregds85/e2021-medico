@extends('layouts5.app')
@section('content')

<?php $perfil=Auth::user()->perfil; 
 $macroUsr=Auth::user()->macro; 

if($perfil<>"municipal"){
  session()->flush();
}
?>


<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Mapas</h2>
            </div>
        </div>
    </div>
   <div><td>Macro:</td><td> {{ Auth::user()->macro}}</td> </div>
  <?php $macroUsr=Auth::user()->macro; ?> 

 <?php
use App\Models\incluir_mapa_p2;
use App\Http\Controllers\IncluirMapaP2sController;


$tabela = incluir_mapa_p2::all(); 
$itens = incluir_mapa_p2::where('id',$id)->get();
?>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title"><b>Mapa Completo</b></h5>
       </td>
    </div>
 </div>


	   @foreach ($itens as $m)
        <!-- Passo 2 !-->
    <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title"><b>ID : {{$m->$id}}</b></h5>
          <h6 class="card-title"><b></b></h6>
          <p class="card-text"><b> Id do Mapa: {{$m->idMapa}} </b></p>
          <?php $idMapaa=$m->idMapa; ?>
          <p class="card-text"><b> Id do Paciente: {{$m->idPaciente}} </b></p>
          <p class="card-text"><b> codSolicitacao: {{$m->codSolicitacao}} </b></p>
          <p class="card-text"><b> cns	: {{$m->cns	 }} </b></p>
          <p class="card-text"><b> Nome do Usuário: {{$m->nomeUsuario }} </b></p>
          <p class="card-text"><b> Municipio: {{$m->municipio }} </b></p>
          <p class="card-text"><b> Usuário do Sistema: {{$m->usuarioSistema }} </b></p>
          <p class="card-text"><b> Macro: {{$m->macro }} </b></p>
          <?php   $macroMapa=$m->macro;

                if($macroUsr<>$macroMapa){
                    flush();
                }

            ?>

          <p class="card-text"><b> Criado em : {{$m->created_at }} </b></p>
          <p class="card-text"><b> Atualizado em : {{$m->updated_at }} </b></p>
     </td>
    </div>
 </div>

 @endforeach

 <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title"><b>Dados do Mapa pelo Hospital </b></h5>
       </td>
    </div>
 </div>



 <?php
use App\Models\mapas;
use App\Http\Controllers\MapasController;


$t = mapas::all(); 
$iten = mapas::where('id',$idMapaa)->get();
?>




 @foreach ($iten as $b)  
        <!-- Passo 2 !-->
    <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title"><b>ID : {{$b->id}}</b></h5>
          <h6 class="card-title"><b></b></h6>
          <p class="card-text"><b> Macro: {{$b->macro}} </b></p>
          <p class="card-text"><b> Hospital: {{$b->categoria_id}} </b></p>
          <p class="card-text"><b> Nome: {{$b->nome}} </b></p>
          <p class="card-text"><b> Descrição: {{$b->descricao}} </b></p>
          <p class="card-text"><b> Especialidade: {{$b->especialidade}} </b></p>
          <p class="card-text"><b> Código do Procedimento: {{$b->cod_procedimento}} </b></p>
          <p class="card-text"><b> Procedimento: {{$b->procedimento}} </b></p>
          <p class="card-text"><b> Vagas: {{$b->vagas}} </b></p>
          <p class="card-text"><b> Passo 1: {{$b->passo1}} </b></p>
          <p class="card-text"><b> Login: {{$b->login}} </b></p>
          <p class="card-text"><b> Criado em : {{$b->created_at }} </b></p>
          <p class="card-text"><b> Atualizado em : {{$b->updated_at }} </b></p>
  

     </td>
    </div>
 </div>









 @endforeach



@endsection

