@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Novo Usuário</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Voltar</a>
        </div>
    </div>
</div>



@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Ops!</strong> Houve algum problema com sua Entrada.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

<?php
$id=$_GET['id'];
echo $id;
?>




{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nome:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Nome','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Senha:</strong>
            {!! Form::password('password', array('placeholder' => 'Senha','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Confirmar Senha:</strong>
            {!! Form::password('confirm-password', array('placeholder' => 'Confirmar Senha','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Grupo:</strong>
            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
        </div>
    </div>
</div>



<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <label for="exampleInputCategoria">Hospital</label>
                <select class="form-control" name="categorias_id" id="categoria">

                <?php
                    use App\Models\Categoria;
                    $tabela = categoria::all();
                    $itensP = categoria::where('macro',$id)->get(); ?>

                ?>
               <option value="Hospital Não Selecionado">Hospital Não Selecionado</option>
                @foreach($itensP as $item)
                <option value='{{$item->id}}' >{{$item->id}}{{$item->name}}</option>
                @endforeach
                </select>
            </div>
        </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <label for="exampleInputCategoria">Macro</label>
                <select class="form-control" name="macro" id="categoria">

                <?php
                    use App\Models\macro;
                    $buscoMacro = macro::where('id',$id)->get(); ?>
                ?>

                @foreach($buscoMacro as $item)
                <option value='{{$item->id}}' >{{$item->id}}{{$item->nome}}</option>
                @endforeach

                </select>
            </div>
        </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <label for="exampleInputCategoria">Perfil</label>
                <select class="form-control" name="perfil" id="perfil">
                <option value=''>Selecione o Perfil</option>
                <option value='administrador'>Administrador</option>
                <option value='regulacao'>Regulacao</option>
                <option value='hospital'>Hospital</option>
                <option value='municipal'>Municipal</option>
                <option value='regulador'>Médico Regulador</option>
                </select>
            </div>
        </div>
</div>

<div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>CPF:</strong>
		            <input type="text" name="cpf" class="form-control" placeholder="Entre com o cpf">
           </div>


           <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Telefone:</strong>
		            <input type="text" name="telefone" class="form-control" placeholder="Entre com o telefone">
           </div>          

<div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>

{!! Form::close() !!}

<p class="text-center text-primary"><small>Usuários</small></p>
@endsection
