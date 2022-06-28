@extends('layouts3.app')
@section('content')


<div class="container">

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <?php
    use App\Models\Categoria;
    $tabela = categoria::all();
?>

<div><td>Macro:</td><td> {{Auth::user()->macro}}</td> </div>
<?php $m=Auth::user()->macro; ?>
<?php $itensP = Categoria::where('macro',$m)->get(); ?> 

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>Hospital</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach($itensP as $item)
	    <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
	        <td>
            <form action="{{ route('hospital.destroy',$item->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('hospital.show',$item->id) }}">Mostrar</a>
                </form>
	        </td>
        </tr>
        @endforeach
    </table>


@endsection
</div>
