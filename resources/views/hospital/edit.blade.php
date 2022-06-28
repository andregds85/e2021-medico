@extends('layouts3.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar paciente</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pacientes.index') }}"> Voltar</a>
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


    <form action="{{ route('pacientes.update',$paciente->id) }}" method="POST">
    	@csrf
        @method('PUT')

        <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <label for="exampleInputCategoria">Hospital</label>
                <select class="form-control" name="categorias_id" id="categoria">

                <?php
                    use App\Models\Categoria;
                    $tabela = categoria::all();
                ?>

                @foreach($tabela as $item)
                <option value='{{$item->id}}' >{{$item->name}}</option>
                @endforeach

                </select>
            </div>
        </div>
</div>

         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Solicitação:</strong>
		            <input type="text" name="solicitacao" value="{{ $paciente->solicitacao }}" class="form-control" placeholder="Solicitação">
		        </div>
		    </div>
            </div>


            <div class="row">  
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
		            <strong>Cns:</strong>
		            <input type="text" name="cns" value="{{ $paciente->cns }}" class="form-control" placeholder="CNS">
		        </div>
		    </div>
            </div>

            
            <div class="row">  
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
		            <strong>Nome do Usuário</strong>
		            <input type="text" name="nomedousuario" value="{{ $paciente->nomedousuario }}" class="form-control" placeholder="Nome do Usuário">
		        </div>
		    </div>
            </div>



            <div class="row">  
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
		            <strong>Municipio</strong>
		            <input type="text" name="municipio" value="{{ $paciente->municipio }}" class="form-control" placeholder="municipio">
		        </div>
		    </div>
            </div>


            <div class="row">  
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
		            <strong>Data da Solicitação</strong>
		            <input type="date" name="datasolicitacao" value="{{ $paciente->datasolicitacao }}" class="form-control" placeholder="datasolicitacao">
		        </div>
		    </div>
            </div>

             
            <div class="row">  
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
		            <strong>Unidade Desejada</strong>
		            <input type="text" name="unidadedesejada" value="{{ $paciente->unidadedesejada }}" class="form-control" placeholder="unidadedesejada">
		        </div>
		    </div>
            </div>   

                         
 

            <div class="row">  
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
		            <strong>Código </strong>
		            <input type="text" name="codigo" value="{{ $paciente->codigo }}" class="form-control" placeholder="codigo">
		        </div>
		    </div>
            </div>   




       <div class="row">        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Observacao 1 :</strong>
                <textarea class="form-control" style="height:150px" name="observacao1"  placeholder="Observacao 1">{{ $paciente->observacao1 }}</textarea>
            </div>
        </div>   
        </div>   


        <div class="row">        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Observacao 2 :</strong>
                <textarea class="form-control" style="height:150px" name="observacao2"  placeholder="Observacao 2">{{ $paciente->observacao2 }}</textarea>
            </div>
        </div>   
        </div>   


        <div class="row">        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Observacao 3 :</strong>
                <textarea class="form-control" style="height:150px" name="observacao3"  placeholder="Observacao 3">{{ $paciente->observacao3 }}</textarea>
            </div>
        </div>   
        </div>   


        <div class="row">        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Observacao 4 :</strong>
                <textarea class="form-control" style="height:150px" name="observacao4"  placeholder="Observacao 4">{{ $paciente->observacao4 }}</textarea>
            </div>
        </div>   
        </div>   


        <div class="row">        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Observacao 5 :</strong>
                <textarea class="form-control" style="height:150px" name="observacao5"  placeholder="Observacao 5">{{ $paciente->observacao5 }}</textarea>
            </div>
        </div>   
        </div>   


        <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Status da Solicitação</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="statusSolicitacao" id="gridRadios1" value="Verificada" checked>
          <label class="form-check-label" for="gridRadios1">
           Verificada
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="statusSolicitacao" id="gridRadios2" value="Não Verificada">
          <label class="form-check-label" for="gridRadios2">
            Não Verificada
          </label>
        </div>
        </div>
    </div>
  </fieldset> 




    
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Atualizar</button>
		    </div>
		</div>


    </form>


<p class="text-center text-primary"><small>Paciente</small></p>
@endsection
