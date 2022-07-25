@extends('layouts3.app')
@section('content')
<?php
use App\Http\Controllers\MapasController;
use App\Models\mapas;

$perfil= Auth::user()->perfil;
$regiao= Auth::user()->macro;


?>
<div class="container">
<?php 
if($perfil<>"regulacao"){
  session()->flush();
}


use App\Http\Controllers\IncluirMapaP2sController;
use App\Models\incluir_mapa_p2;

$id=$_GET['id']; 
$tabela = mapas::all(); 
$itens  = mapas::where('id',$id)->get();
?>

@foreach ($itens as $mapa)
       
   <!-- Passo 2 !-->
    <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title"><b>Hospital : {{$mapa->categoria_id}}</b></h5>
          <h6 class="card-title"><b></b></h6>
          <p class="card-text"><b> Id: {{$mapa->id }} </b></p>
          <?php $idm=$mapa->id; ?>
          <?php $macro=$mapa->macro; 
          
          if ($regiao<>$macro){
             session()->flush();
          return view('home');
          }
          
          ?>

          <p class="card-text"><b> Nome do Mapa: {{$mapa->nome }} </b></p>
          <p class="card-text"><b> Especialidade: {{$mapa->especialidade }} </b></p>
          <p class="card-text"><b> Procedimento: {{$mapa->procedimento }} </b></p>
          <p class="card-text"><b> Vagas: {{$mapa->vagas }} </b></p>
          <p class="card-text"><b> Criado em : {{$mapa->created_at }} </b></p>
          <p class="card-text"><b> Atualizado em : {{$mapa->updated_at }} </b></p>
      </div>  
      </div> 
 @endforeach

<div class="card mb-3">
    <div class="card-body">
      <h5 class="card-title"><b>Total de pacientes nesse mapa : 
      <b><?php 
      echo $contarVagas=incluir_mapa_p2::where('idMapa', $idm)->count();
      ?>
      </b>
      </h5>
      <h6 class="card-title"><b></b></h6>
        <BR>
    </div>
  </div>

  <div class="card mb-3">
    <div class="card-body">
      <h5 class="card-title"><b>Pacientes do Mapa: 
      </b>
      </h5>
      <h6 class="card-title"><b></b></h6>
        <BR>
    </div>
  </div>

<?php 
$tabela = incluir_mapa_p2::all(); 
$items  = incluir_mapa_p2::where('idMapa',$idm)->get();
?>

@foreach ($items as $m)

   <div class="card mb-3">
   <div class="card-body">
   <p class="card-text"><b> Id do Registro: {{$m->id }} </b></p>
            <?php $idReg=$m->id; ?>
          <h5 class="card-title"><b>Id do Paciente: {{$m->idPaciente}}</b></h5>

          <h6 class="card-title"><b></b></h6>
          <p class="card-text"><b> Id do Mapa: {{$m->idMapa }} </b></p>
       <td>
       <p class="card-text">
       <a href="{{url('excluir', ['id' => $m->id]) }}">Excluir</a>
       </p>
      </td>
        
     </div>
    </div>
 
@endforeach
@endsection
        </div>

