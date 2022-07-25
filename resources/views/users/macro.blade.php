@extends('layouts4.app')
@section('content')

 <div class="card mb-3">
    <div class="card-body">
      <h5 class="card-title">Macro</h5>
    </div>
  </div>

  <div class="card mb-3">
    <div class="card-body">
      <p>Escolha a Macro para continuar com Cadastro de Usuário</p>
    </div>
  </div>

    <?php
     use App\Models\macro;
     $tabela = macro::all();
    ?>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Macro</th>
            <th>Ação</th>
        </tr>

        @foreach($tabela as $item)
	    <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nome }}</td>

        <td>
                 <form action="{{route('users.create',$item->id)}}" method="POST">
                       <a href="{{ route('users.create', ['id' => $item->id]) }}">Próxima Etapa</a>

                    </form>
                    </td>

        </tr>
	    @endforeach
    </table>



@endsection
