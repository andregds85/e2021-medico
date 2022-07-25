@extends('limpo.app')
@section('content')
<?php 
session_start();

use App\Models\mapas;
use App\Models\Pacientes;


use App\Http\Controllers\MapasController;
use App\Http\Controllers\mapahospitalController;
use App\Http\Controllers\PacienteController;


use App\Models\incluir_mapa_p2;
use App\Models\mapahospital;
use App\Models\municipio_mapa_p3;


$senha=$id;
$hash = base64_encode($senha);
$hash;

?>
<p class="card-text">
<a  class="btn btn-danger" href="{{url('confirma', ['id' => $hash]) }}">Confirmação</a>
</p>


<?php
$tab  = mapahospital::all();
$hosp = mapahospital::where('id',$id)->get();

?>
@foreach ($hosp as $o1)
<b>Preenchimento pelo Hospital</b><br>
<br>

<b>Id Referencia:</b>{{$o1->idp3 }}<br>
<b>Prontuário do Hospital:</b>{{$o1->prontuarioHospital }}<br>
<b>Data da Cirurgia:</b>{{$o1->prontuarioHospital }}<br>
<b>Observação do Hospital:</b>{{$o1->obsHospital }}<br>
<b>Realizou Cirurgia Sim / Não </b>{{$o1->realizou }}<br>
@endforeach
<?php
$muni = municipio_mapa_p3::all();
$municipio = municipio_mapa_p3::where('idp2',$o1->idp3)->get();


?>

<br>
<br>

<b>Preenchimento pelo Municipio</b><br>
<br>
	
@foreach ($municipio as $o)
<b>Id do Registro / Observação Municipio:</b>{{$o->id }}<br>
<b>Observação do Municipio:</b>{{$o->observacao }}<br>
<b>Id paciente:</b>{{$o->idPaciente }}<br>
<?php 
$_SESSION['idPaciente']=$o->idPaciente;
?>
<b>Id Referencia:</b>{{$o->idp2 }}<br>
@endforeach

<?php
$regula = incluir_mapa_p2::all();
$regulacao2 = incluir_mapa_p2::where('id',$o->idp2)->get();
?>

<br>
<br>
<b>Preenchimento pelo Regulação</b><br>
<br>

@foreach ($regulacao2  as $t2)
    <tr>
      <td><b>Id do Mapa:</b>{{$t2->idMapa }} <br>

<?php      $_SESSION['idMapa']=$t2->idMapa;  ?> 

           <b>Id do Paciente:</b>{{$t2->idPaciente }}<br>

           <?php 
              $buscoPac = Pacientes::all();   
              $pacBuscou = Pacientes::where('id',$t2->idPaciente)->get(); 
              ?>
              @foreach ($pacBuscou as $z)

          <b>Código da Solicitação: </b> {{$z->solicitacao }}<br>
          <?php      $_SESSION['solicitacao']=$z->solicitacao;  ?> 

  
          <b>Data da Inserção :</b>{{$z->created_at }}<br>
          <b>CNS:</b>{{$z->cns }}<br>
          <?php      $_SESSION['cns']=$z->cns; ?> 
          <b>Municipio:</b>{{$z->municipio }}<br>
     </td>
     <td>
    <b> Nome do Usuário: </b> {{$z->nomedousuario}}<br>
    <b> Macro:</b> {{$t2->macro}}<br>
    @endforeach
<br>
<br>
<b>Criado pelo Hospital / Dados do Mapa</b><br>
<br>


<?php
$mapa = mapas::all();
$mapaEsp = mapas::where('id',$t2->idMapa)->get();
?>

@foreach ($mapaEsp as $t3)
    <tr>
      <td><b>Id do Mapa:</b>{{$t3->categoria_id }} <br>
           <b>Nome:</b>{{$t3->nome }}<br>
           <b>Descrição: </b> {{$t3->descricao }}<br>
           <b>Especialidade:</b>{{$t3->especialidade }}<br>
           <b>Código do Procedimento:</b>{{$t3->cod_procedimento}}<br>
           <b>Procedimento:</b>{{$t3->procedimento }}<br>
     <b>Vagas: </b> {{$t3->vagas }}<br>
     </td>
     <td>
 @endforeach

 @endforeach

  


@endsection

