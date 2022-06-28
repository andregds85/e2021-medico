@extends('limpo.app')
@section('content')

<?php
use App\Http\Controllers\HospitalController;
use App\Models\Pacientes;
use App\Models\pacientes_line;

$id;
$itens = Pacientes::where('categorias_id',$id)->get();
?>

<table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>Status</th>
            <th>Solicitação</th>
            <th width="280px">Ação</th>
        </tr>
@foreach($itens as $item)
<tr>
      <td>{{$item->id}}</td>
      <td>{{$item->statusSolicitacao}}</td>
      <td>{{$item->solicitacao}}</td>
      <td>
            <form action="{{ route('hospital.destroy',$item->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('pacientes.show',$item->id) }}">Mostrar</a>
                </form>
	        </td>
</tr>
 @endforeach
</table>




<p class="text-center text-primary"><small>Hospital</small></p>
@endsection





