@extends('layouts4.app')
@section('content')


<div class="container">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Hospital</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('categorias.create') }}"> Novo Hospital</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>x</th>
            <th>Nome</th>
            <th>Cnes</th>
            <th>Macro</th>
            <th width="280px">Ação</th>
        </tr>
	    @foreach ($categorias as $categoria)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $categoria->name }}</td>
	        <td>{{ $categoria->cnes }}</td>
            <td>{{ $categoria->macro }}</td>
	        <td>
                <form action="{{ route('categorias.destroy',$categoria->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('categorias.show',$categoria->id) }}">Mostrar</a>
                    @can('categoria-edit')
                    <a class="btn btn-primary" href="{{ route('categorias.edit',$categoria->id) }}">Editar</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('categoria-delete')
                    <button type="submit" class="btn btn-danger">Deletar</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>

    {!! $categorias->links() !!}

@endsection

</div>