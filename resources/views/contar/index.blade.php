@extends('layouts3.app')
@section('content')

<?php
use App\Http\Controllers\MapasController;
use App\Models\mapas;

use App\Models\finalMaps;
use App\Models\Pacientes;

use App\Http\Controllers\mapahospitalController;
use App\Http\Controllers\finalMapsController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MunicipioController;


use App\Models\incluir_mapa_p2;
use App\Models\mapahospital;
use App\Models\municipio_mapa_p3;


$perfil= Auth::user()->perfil;
$regiao= Auth::user()->macro;

?>
<div class="container">
<?php 
$perfil= Auth::user()->perfil;

if($perfil<>"regulador"){
 session()->flush();
}

use App\Http\Controllers\IncluirMapaP2sController;

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
   <p class="card-text">
    
   
   <td>
       <p class="card-text">
      <div class="alert alert-primary" role="alert">

      Regulação <br>
    

      <b> Id do Registro: {{$m->id }} </b></p>
          <?php $idReg=$m->id; ?>
          <h5 class="card-title"><b>Id do Paciente: {{$m->idPaciente}}</b></h5>

          <h6 class="card-title"><b></b></h6>
          <p class="card-text"><b> Id do Mapa: {{$m->idMapa }} </b></p>

          <?php 
              $buscoPac = Pacientes::all();   
              $pacBuscou = Pacientes::where('id',$m->idPaciente)->get(); 
              ?>
              @foreach ($pacBuscou as $z)

           <b>Código da Solicitação: </b> {{$z->solicitacao }}<br>
           <b>Data da Inserção :</b>{{$z->created_at }}<br>
           <b>CNS:</b>{{$z->cns }}<br>
           <b>Municipio:</b>{{$z->municipio }}<br>
           <b> Nome do Usuário: </b> {{$z->nomedousuario}}<br>
           <b> Macro:</b> {{$z->macro}}<br>
     </div>
       </p>
      </td>
        
         
      <td>
       <p class="card-text">
       <div class="alert alert-info" role="alert">
       Municipio

       <?php 
      $tabelap3 = municipio_mapa_p3::all();
      $vbobserv = municipio_mapa_p3::where('idPaciente',$m->idPaciente)->get();
      echo  $observacao = municipio_mapa_p3::where('idPaciente',$m->idPaciente)->count();

  if($observacao==0){
    echo "Falta o municipio inserir a Observação";
  }?>
<br>

@foreach ($vbobserv as $o)
<b>Id do Registro / Observação Municipio:</b>{{$o->id }}<br>
<b>Observação do Municipio:</b>{{$o->observacao }}<br>
<b>Id paciente:</b>{{$o->idPaciente }}<br>
<b>Id Referencia:</b>{{$o->idp2 }}<br>


      </div>
      </p>
      </td>

<td>
     <p class="card-text">
       <div class="alert alert-warning" role="alert">
       Hospital

       
       <?php 
$tab = mapahospital::all();
$hosp = mapahospital::where('idPaciente',$m->idPaciente)->get();
/*
echo  $observacao = mapahospital::where('idp2',$ref)->count();

  if($observacao==0){
    echo "Falta o municipio inserir a Observação";
  }  */ ?>
<br>
	
@foreach ($hosp as $o1)
<b>Id Referencia:</b>{{$o1->idp3 }}<br>
<b>Prontuário do Hospital:</b>{{$o1->prontuarioHospital }}<br>
<b>Data da Cirurgia:</b>{{$o1->prontuarioHospital }}<br>
<b>Observação do Hospital:</b>{{$o1->obsHospital }}<br>
<b>Realizou Cirurgia Sim / Não </b>{{$o1->realizou }}<br>
<b>Usuário:</b>{{$o1->usuario }}<br>

      </div>
       </p>
      </td>

      <td>
       <p class="card-text">
       <div class="alert alert-primary" role="alert">
       Regulação 
       
<?php
    
        $final = finalMaps::where('idPaciente',$m->idPaciente)->get(); ?>
        @foreach ($final as $f1)

        <b>Id de Referencia</b>{{$f1->idp4 }}<br>
        <b>Observação da Central:</b>{{$f1->obsCentral }}<br>
        <b>Status do Sisreg:</b>{{$f1->statusSisreg }}<br>
        <b>Código do Sisreg:</b>{{$f1->codSisReg }}<br>

        <b>CNS:</b>{{$f1->cns }}<br>
        <b>ID DO Mapa:</b>{{$f1->idMapa}}<br>
        <b>ID DO Paciente:</b>{{$f1->idPaciente}}<br>

      </div>
       </p>
      </td>
        
       <td>
       <p class="alert alert-success">
       <a href="{{url('excluir', ['id' => $m->id]) }}">Excluir</a>
       </p>
      </td>
     

     </div>
    </div>

    
@endforeach
@endforeach
@endforeach
@endforeach
@endforeach
@endsection
        </div>


