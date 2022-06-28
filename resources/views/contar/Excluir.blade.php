@extends('limpo.app')
@section('content')
<?php 

 use App\Http\Controllers\IncluirMapaP2sController;
 use App\Models\incluir_mapa_p2;
 use App\Models\Pacientes;

 $a=incluir_mapa_p2::all();
 $c=incluir_mapa_p2::where('id', $id)->get(); 
?>

 @foreach ($c as $t)
 <tr>
 <td>{{$t->idPaciente}}</td>

<?php
 $idPac=$t->idPaciente;  
 Pacientes::where('id',$idPac)->update(['statusSolicitacao' => 'N']);   
 $b=incluir_mapa_p2::where('id', $id)->delete();
?>

<div class="alert alert-secondary" role="alert">
 Paciente retirado do Mapa. 
</div>

@endsection

@endforeach


