@extends('layouts3.app')
@section('content')

<?php $perfil=Auth::user()->perfil; 


?> </b></p>

<div class="container">


<!-- Passo 1 !-->
  <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title"><b>Pacientes pendente pelo Médico Regulador</b></h5>
        <h6 class="card-title"><b></b></h6>
              

      </div>
    </div>

<?php
use App\Models\medicoRegulador;
use App\Models\regulador;
use App\Http\Controllers\medicoReguladorController;
use App\Http\Controllers\reguladorController;

$tabela = regulador::all(); 
$itens = regulador::where('avFinal','pendente')->get();
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
          <h5 class="card-title"><b>id do Paciente : {{$mapa->id_paciente}}</b></h5>
          <h6 class="card-title"><b></b></h6>
          <p class="card-text"><b> Id do Registro: {{$mapa->id }} </b></p>
          <?php $id=$mapa->id; ?>
          <p class="card-text"><b> Observação : {{$mapa->obs }} </b></p>
          <p class="card-text"><b> Avaliação Final: {{$mapa->avfinal }} </b></p>
          <p class="card-text"><b> Login: {{$mapa->login }} </b></p>

      
  
       <td>
       <p class="card-text">
       <a href="#" class="btn btn-light">Detalhamento</a>
       </p>
      </td>
<?php 


?>




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


