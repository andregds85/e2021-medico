@extends('layouts3.app')
@section('content')
<?php
use App\Http\Controllers\MapasController;
use App\Models\mapas;

use App\Models\finalMaps;
use App\Models\Pacientes;
use App\Models\medicoRegulador;
use App\Models\regulador;

use App\Http\Controllers\mapahospitalController;
use App\Http\Controllers\finalMapsController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\reguladorController;


use App\Models\incluir_mapa_p2;
use App\Models\mapahospital;
use App\Models\municipio_mapa_p3;

$perfil= Auth::user()->perfil;
$regiao= Auth::user()->macro;

?>
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

<table class="table">
  <tbody>
    <tr>
@foreach ($itens as $mapa)
        <td> Hospital : {{$mapa->categoria_id}}<br>
           Id: {{$mapa->id }} <br>
          <?php $idm=$mapa->id; ?>
          <?php $macro=$mapa->macro; 
          
          if ($regiao<>$macro){
             session()->flush();
          return view('home');
          }
                    ?>
        Nome do Mapa: {{$mapa->nome }}<br> 
        Especialidade: {{$mapa->especialidade }}<br> 
        Procedimento: {{$mapa->procedimento }}<br>
        Vagas: {{$mapa->vagas }} <br>
        Criado em : {{$mapa->created_at }} <br>
        Atualizado em : {{$mapa->updated_at }} <br>

 @endforeach

 <hr>
<table class="table">
  <tbody>
    <tr>
Total de pacientes nesse mapa : 
<?php 
 echo $contarVagas=incluir_mapa_p2::where('idMapa', $idm)->count();
?>

<br>
Pacientes do Mapa: 
<?php 
$tabela = incluir_mapa_p2::all(); 
$items  = incluir_mapa_p2::where('idMapa',$idm)->get();
?>
<br>
</td>
      </tr>
  </tbody>
</table>

<table class="table">
  <tbody>
    <tr>
@foreach ($items as $m)
<hr>
      Regulação 
  Id do Registro: {{$m->id }} 
          <?php $idReg=$m->id; ?><br><br>
         <b> Id do Paciente: {{$m->idPaciente}} </b><br>
             Id do Mapa: {{$m->idMapa }} <br>
          <?php 
              $buscoPac = Pacientes::all();   
              $pacBuscou = Pacientes::where('id',$m->idPaciente)->get(); 
              ?>
              @foreach ($pacBuscou as $z)

           Código da Solicitação:  {{$z->solicitacao }}<br>
           Data da Inserção :{{$z->created_at }}<br>
           CNS:</b>{{$z->cns }}<br>
           Municipio:{{$z->municipio }}<br>
           Nome do Usuário: {{$z->nomedousuario}}<br>
           Macro: {{$z->macro}}<br>
      </tr>
  </tbody>
</table>   

<table class="table">
  <tbody>
    <tr>
    Municipio <br>

       <?php 
      $tabelap3 = municipio_mapa_p3::all();
      $vbobserv = municipio_mapa_p3::where('idPaciente',$m->idPaciente)->get();
      echo  $observacao = municipio_mapa_p3::where('idPaciente',$m->idPaciente)->count();

  if($observacao==0){
    echo "Falta o municipio inserir a Observação";
  }?>
<br>
@foreach ($vbobserv as $o)
Id do Registro / Observação Municipio:</b>{{$o->id }}<br>
Observação do Municipio:</b>{{$o->observacao }}<br>
Id paciente:{{$o->idPaciente }}<br>
Id Referencia:{{$o->idp2 }}<br>
      </tr>
  </tbody>
</table>   


<table class="table">
  <tbody>
    <tr>
     Hospital
       
       <?php 
$tab = mapahospital::all();
$hosp = mapahospital::where('idPaciente',$m->idPaciente)->get();
/*
echo  $observacao = mapahospital::where('idp2',$ref)->count();

  if($observacao==0){
    echo "Falta o municipio inserir a Observação";
  }  */ ?>
	
@foreach ($hosp as $o1)
Id Referencia:{{$o1->idp3 }}<br>
Prontuário do Hospital:{{$o1->prontuarioHospital }}<br>
Data da Cirurgia:{{$o1->prontuarioHospital }}<br>
Observação do Hospital:{{$o1->obsHospital }}<br>
<b>Realizou Cirurgia Sim / Não : </b><font color="blue"> {{$o1->realizou }} </font><br>


Usuário:{{$o1->usuario }}<br>
</td>
      </tr>
  </tbody>
</table>  


<table class="table">
  <tbody>
    <tr>
    Regulação 
    <?php
    
        $final = finalMaps::where('idPaciente',$m->idPaciente)->get(); ?>
        @foreach ($final as $f1)

        Id de Referencia{{$f1->idp4 }}<br>
        Observação da Central:{{$f1->obsCentral }}<br>
        Status do Sisreg:{{$f1->statusSisreg }}<br>
        Código do Sisreg:{{$f1->codSisReg }}<br>

        CNS:{{$f1->cns }}<br>
        ID DO Mapa:{{$f1->idMapa}}<br>
        ID DO Paciente:{{$f1->idPaciente}}<br>
      <br>
      <a href="{{url('medico', ['id' =>Crypt::encrypt($f1->idPaciente)]) }}" class="btn btn-danger">Realizou Cirurgia</a>

     </tr>
  </tbody>
</table>  


<table class="table">
  <tbody>
    <tr>

<?php
$regulad=regulador::all();
$ob = regulador::where('id_paciente',$m->idPaciente)->count();
        if($ob<>0){ ?>
<div class="alert alert-danger" role="alert">
 Paciente Regulado
</div>      
<?php }
?>
    </tr>
 </tbody>
</table>  






@endforeach
@endforeach
@endforeach
@endforeach
@endforeach
@endsection

