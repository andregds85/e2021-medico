@extends('layouts4.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Novo Hospital</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('categorias.index') }}"> Voltar</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ops!</strong> Houve algum erro na sua entrada<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categorias.store') }}" method="POST">
    	@csrf

         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Nome:</strong>
		            <input type="text" name="name" class="form-control" placeholder="Entre com o nome">
                </div>


                <div class="form-group">
		            <strong>Cnes:</strong>
		            <input type="text" name="cnes" class="form-control" placeholder="Entre com o cnes">
                </div>


    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <label for="exampleInputCategoria">Macro</label>
                <select class="form-control" name="macro" id="categoria">

                <?php
                    use App\Models\macro;
                    $tabela = macro::all();
                ?>

                @foreach($tabela as $item)

                <option value='{{$item->id}}' >{{$item->id}}{{$item->nome}}</option>

                @endforeach

            </select>
            </div>
        </div>
</div>
            </div>

		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Cadastrar</button>
		    </div>
		</div>
    </form>
@endsection




