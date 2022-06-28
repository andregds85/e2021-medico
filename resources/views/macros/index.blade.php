@extends('layouts4.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Macros</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('macros.create') }}"> Nova Macro</a>
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
            <th>id</th>
            <th>nome</th>
        </tr>
	    @foreach ($macros as $macro)
	    <tr>
           <td>{{ $macro->id }}</td>
           <td>{{ $macro->nome }}</td>
        </tr>
	    @endforeach
    </table>

    {!! $macros->links() !!}
    {!! $macros->links() !!}


<p class="text-center text-primary"><small>Macro</small></p>
@endsection
