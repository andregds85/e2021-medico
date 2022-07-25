@extends('layouts2.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Mapas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('mapas.create') }}">Novo Mapa</a>
            </div>
        </div>
    </div>
  
  <div><td>Macro:</td><td> {{ Auth::user()->macro}}</td> </div>
    <?php $macroUsr=Auth::user()->macro; ?> 
    <div><td>Hospital:</td><td> {{ Auth::user()->categorias_id}}</td> </div>
    <?php $hospUsr=Auth::user()->categorias_id; ?> 

 <?php
use App\Http\Controllers\MapasController;

use App\Models\mapas;

$tabela = mapas::all(); 
$itens = mapas::where('categoria_id',$hospUsr)->get();
?>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Hospital</th>
            <th>Nome do Mapa</th>
            <th>Especialidade</th>
            <th>Procedimento</th>
            <th>Vagas</th>
            <th width="280px">Ação</th>
        </tr>

	    @foreach ($itens as $mapa)
        
	    <tr>
	        <td>{{$mapa->id }}</td>
            <?php $idM=$mapa->id; ?>
	        <td>{{$mapa->categoria_id}}</td>
	        <td>{{$mapa->nome}}</td>
            <td>{{$mapa->especialidade }}</td>
            <td>{{$mapa->procedimento}}</td>
            <td>{{$mapa->vagas}}</td>
	        <td>

                <form action="{{ route('mapas.destroy',$mapa->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('mapas.show',$mapa->id) }}">Mostrar</a>
               <?php /*                                         
                    @csrf
                    @method('DELETE')
                    @can('mapas-delete')
                    <button type="submit" class="btn btn-danger">Deletar</button>
                    @endcan  */ ?>
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $mapas->links() !!}

@endsection
