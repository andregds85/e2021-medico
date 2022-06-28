@extends('layouts2.app')
@section('content')
  
<?php $hospital=Auth::user()->categorias_id; ?>
<?php $userMacro=Auth::user()->macro; ?>
<?php $login=Auth::user()->email; ?>
<?php $cpf=Auth::user()->cpf; ?>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Novo Mapa</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('mapas.index') }}"> Voltar</a>
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

    <form action="{{ route('mapas.store') }}" method="POST">
    	@csrf

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
	   <div class="form-group">
	       <strong>Nome do Mapa</strong>
		  <input type="text" name="nome" class="form-control" placeholder="Entre com o nome do Mapa">
      </div>
 
 
 <div class="row">
 <div class="col-xs-12 col-sm-12 col-md-12">
 <div class="form-group">
 <label for="exampleInputCategoria"><?php
 
 use App\Models\Categoria;
 $tabela = categoria::all();

 $itensP = categoria::where('id',$hospital)->get();
?>
 @foreach ($itensP as $hospital)
 <td>{{ $hospital->name }}</td>
@endforeach

 </label>
    
    <select class="form-control" name="categoria_id" id="categoria">
                     
      <option value=' {{Auth::user()->categorias_id}}' >{{Auth::user()->categorias_id}}</option>
            
            </select>
            </div>
       


            <div class="row">
 <div class="col-xs-12 col-sm-12 col-md-12">
 <div class="form-group">
 <label for="exampleInputCategoria">
     
    <select class="form-control" name="macro" id="macro">
                     
      <option value=' {{Auth::user()->macro}}' >{{Auth::user()->macro}}</option>
            
            </select>
            </div>


      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Descrição:</strong>
                <textarea class="form-control" style="height:150px" name="descricao" placeholder="Descrição"></textarea>
            </div>
        </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
	   <div class="form-group">
	       <strong>Especialidade:</strong>
		  <input type="text" name="especialidade" class="form-control" placeholder="Entre com a Especialidade">
      </div>
      </div>


      <div class="col-xs-12 col-sm-12 col-md-12">
	   <div class="form-group">
	       <strong>Código do Procedimento:</strong>
		  <input type="text" name="cod_procedimento" class="form-control" placeholder="Entre com o Código do Procedimento">
      </div>
      </div>

      
      <div class="col-xs-12 col-sm-12 col-md-12">
	   <div class="form-group">
	       <strong>Procedimento:</strong>
		  <input type="text" name="procedimento" class="form-control" placeholder="Entre com o Procedimento">
      </div>
      </div>


      <div class="col-xs-12 col-sm-12 col-md-12">
	   <div class="form-group">
	       <strong>Vagas:</strong>
   <input type="text" name="vagas" class="form-control" placeholder="Quantas vagas para o procedimento">
   </div>
   </div>

   
    <div class="form-group">
    <label for="exampleInputCategoria">Confirmação Passo 1 </label>
    <select class="form-control" name="passo1" id="confirma">
    <option value='confirmado' >confirmado</option>
    </select>
    </div>


    <div class="form-group">
    <label for="exampleInputCategoria">Login </label>
    <select class="form-control" name="login"> 
    <option value='<?php echo $login ?>' >{{Auth::user()->email}}</option>
    </select>
    </div>


    <div class="form-group">
    <label for="exampleInputCategoria">CPF</label>
    <select class="form-control" name="cpf" id="cpf">
    <option value='<?php echo $cpf ?>' >{{Auth::user()->cpf}}</option>
    </select>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
	   <button type="submit" class="btn btn-primary">Cadastrar</button>
		    </div>
		</div>
    </form>
@endsection

