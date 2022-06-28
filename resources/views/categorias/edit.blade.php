@extends('layouts4.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Categoria</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('categorias.index') }}"> Voltar</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ops!</strong> Teve algum problema com sua entrada <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('categorias.update',$categoria->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" value="{{ $categoria->name }}" class="form-control" placeholder="Nome">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
		            <strong>Cnes:</strong>
		            <input type="text" name="cnes" value="{{ $categoria->cnes }}" class="form-control" placeholder="Cnes">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Atualizar</button>
		    </div>
		</div>


    </form>


<p class="text-center text-primary"><small>Laravel</small></p>
@endsection
