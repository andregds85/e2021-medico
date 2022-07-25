@extends('layouts3.app')
@section('content')


<?php $perfil=Auth::user()->perfil; 

if($perfil<>"regulacao"){
  session()->flush();
}

?> </b></p>

<div class="container">


<!-- Passo 1 !-->
  <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title"><b>Mapas da Regulação</b></h5>
        <h6 class="card-title"><b></b></h6>
              
        <p class="card-text"><b><div><td>Macro:</td><td> {{ Auth::user()->macro}}</td> </div>
        <?php $macroUsr=Auth::user()->macro; ?> </b></p>

        <p class="card-text"> <div><td>Hospital:</td><td> {{ Auth::user()->categorias_id}}</td> </div>
       <?php $hospUsr=Auth::user()->categorias_id; ?>  </p>
      </div>
    </div>
 <?php
use App\Http\Controllers\MapasController;
use App\Models\mapas;

use App\Http\Controllers\IncluirMapaP2sController;
use App\Models\incluir_mapa_p2;

$tabela = mapas::all(); 
$itens = mapas::where('macro',$macroUsr)->get();
/*
$todos= incluir_mapa_p2::all(); 
*/
?>

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


@foreach ($itens as $mapa)
   <!-- Passo 2 !-->
    <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title"><b>Hospital : {{$mapa->categoria_id}}</b></h5>
          <h6 class="card-title"><b></b></h6>
          <p class="card-text"><b> Id: {{$mapa->id }} </b></p>
          <?php $id=$mapa->id; ?>
          <p class="card-text"><b> Nome do Mapa: {{$mapa->nome }} </b></p>
          <p class="card-text"><b> Especialidade: {{$mapa->especialidade }} </b></p>
          <p class="card-text"><b> Procedimento: {{$mapa->procedimento }} </b></p>
          <p class="card-text"><b> Vagas: {{$mapa->vagas }} </b></p>
          <p class="card-text"><b> Criado em : {{$mapa->created_at }} </b></p>
          <p class="card-text"><b> Atualizado em : {{$mapa->updated_at }} </b></p>
  
       <td>
       <p class="card-text">
       <a href="{{route('contar.index', ['id' => $mapa->id]) }}">Detalhamento</a>
       </p>
      </td>
<?php 



?>

      <td>
       <p class="card-text">
       <a href="{{url('listar', ['id' => base64_encode($mapa->id)]) }}">Listar o Mapa Completo</a>
       </p>
      </td>





     </td>




     <?php
   /*echo route('contar', ['id' => 1]); */
   /*
    echo  $contarVagas=incluir_mapa_p2::where('idMapa', 3)->count();
   */
     ?>
        </div>
      </div>

	    @endforeach
@endsection



</div>