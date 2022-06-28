@extends('layouts4.app')
@section('content')
<div class="card mb-3">
  <div class="card-body">
    <h5 class="card-title">Exportar Usuários</h5>
    <p class="card-text">
   <a class="nav-link" href="{{ url('import_export') }}">Exportar Usuários</a>

    </p>
  </div>
</div>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Gerenciamento de Usuários</h2>
        </div>
        <p class="card-text">
        <a class="nav-link" href="{{ url('macro') }}">Cadastrar Usuário</a>
       </p>
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
   <th>Email</th>
   <th>Grupo</th>
   <th width="280px">Ação</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Mostrar</a>
       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Editar</a>
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}


<p class="text-center text-primary"><small>usuários</small></p>
@endsection



