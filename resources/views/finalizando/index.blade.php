@extends('limpo.app')
@section('content')
<?php 

use App\Models\mapas;
use App\Models\finalMaps;


use App\Http\Controllers\MapasController;
use App\Http\Controllers\mapahospitalController;
use App\Http\Controllers\finalMapsController;



use App\Models\incluir_mapa_p2;
use App\Models\mapahospital;
use App\Models\municipio_mapa_p3;





$macro=Auth::user()->macro; 

$tabela = mapas::all(); 
$itensP = mapas::where('macro',$macro)->get(); 

$tabelap2 = incluir_mapa_p2::all(); 
$itensP2 =  incluir_mapa_p2::where('macro',$macro)->get(); 
?>


<?php $hospUsr=Auth::user()->categorias_id; ?> 


<form>
   <input type="button" value="Imprimir" onClick="window.print()" />
</form>

    @foreach ($itensP  as $t)

    <!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  </head>
<body>


<table class="table table-sm table-dark">
  <tbody>
    <tr>
       <td align="center"><b> Mapa criado pelo hospital</b></td>
       
    </tr>
  </tbody>
</table>

<table class="table table-sm table-dark">
  <tbody>
    <tr>
      <td><b>Id do Mapa:</b>{{$t->id }} <br>
          <b>Macro:</b>{{$t->macro }}<br>
           <b>Hospital: </b> {{$t->categoria_id }}<br>

            <?php $hosptb=$t->categoria_id; ?>
       
           <b>Nome do Mapa:</b>{{$t->nome }}<br>
           <b>Descrição:</b>{{$t->descricao }}<br>
     <b>Especialidade: </b> {{$t->especialidade }}<br>
     </td>
     <td>
   
    <b> Código do Procedimento: </b> {{$t->cod_procedimento}}<br>
    <b> Procedimento:</b> {{$t->procedimento}}<br>
    <b> Vagas:</b> {{$t->vagas}}<br>
    <b> Criado em :</b> {{$t->created_at}}<br>
    <b> Autalizado em :</b> {{$t->updated_at}}<br>
   
  </td>
    </tr>
  </tbody>
</table>


<table class="table table-bordered">
  <tbody>
    <tr>
       <td align="center"><b> Pacientes inseridos no mapa</b></td>
       
    </tr>
  </tbody>
</table>

@foreach ($itensP2  as $t2)

<table class="table table-bordered">
  <tbody>
    <tr>
       <td align="center"><b> Paciente Inserido</b></td>
       </tr>
  </tbody>
</table>

<table class="table table-bordered">
  <tbody>
    <tr>
      <td><b>Id do Mapa:</b>{{$t2->idMapa }} <br>
           <b>Id do Paciente:</b>{{$t2->idPaciente }}<br>
           <b>Código da Solicitação: </b> {{$t2->codSolicitacao }}<br>
           <b>Data da Inserção :</b>{{$t2->created_at }}<br>

           <b>CNS:</b>{{$t2->cns }}<br>

          
           <b>Municipio:</b>{{$t2->municipio }}<br>
     <b>Usuario do Sistema: </b> {{$t2->usuarioSistema }}<br>
     </td>
     <td>

    <b> Nome do Usuário: </b> {{$t2->nomeUsuario}}<br>
    <b> CPF do Usuário:</b> {{$t2->cpfUsuarioSistema}}<br>
    <b> Macro:</b> {{$t->macro}}<br>

<?php 
$tabelap3 = municipio_mapa_p3::all();
$vbobserv = municipio_mapa_p3::where('idp2',$t2->id)->get();


echo  $observacao = municipio_mapa_p3::where('idp2',$t2->id)->count();

  if($observacao==0){
    echo "Falta o municipio inserir a Observação";
  }?>
<br>
	

@foreach ($vbobserv as $o)
<b>Id do Registro / Observação Municipio:</b>{{$o->id }}<br>
<b>Observação do Municipio:</b>{{$o->observacao }}<br>
<b>Id paciente:</b>{{$o->idPaciente }}<br>
<b>Id Referencia:</b>{{$o->idp2 }}<br>

<?php 

$tab = mapahospital::all();
$hosp = mapahospital::where('idp3',$o->idp2)->get();

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

<?php
   $final= finalMaps::where('idp4',$o1->id)->count();

        if ($final==0){ ?> 
        <b><a class="btn btn-info" href="{{ route('final.show',$o1->id)}}">Finalizar Mapa</a>   <?php 
   }



?>


@endforeach
@endforeach 

  </td>
    </tr>
  </tbody>
</table>



@endforeach

     <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>

    @endforeach   
 

    
    </html>

@endsection



