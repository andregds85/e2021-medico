@extends('limpo.app')
@section('content')

<?php
$macro=Auth::user()->macro;
$perfil=Auth::user()->perfil;
$login=Auth::user()->email;
$cpf=Auth::user()->cpf;
$id=$_GET['id'];


use App\Models\finalMaps;
use App\Http\Controllers\finalMapsController;






?>

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Observação do Mapa  </h2>
                <div><td>Macro:</td><td> {{Auth::user()->macro}}</td> </div>

            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('observacao') }}"> Voltar</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ops!</strong> Houve algum erro na sua entrada<br><br>
            <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                     }@endforeach
            </ul>
        </div>
    @endif


<form action="{{route('municipio.store')}}" method="POST">
    	@csrf


    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <label for="exampleInputCategoria">Id da Inscrição</label>
                <select class="form-control" name="idIncMapa" id="idIncMapa">
                <option value='<?php echo $id; ?>'><?php echo $id; ?></option>
                </select>
            </div>
        </div>
</div>




<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <label for="exampleInputCategoria">Observação</label>
                <select class="form-control" name="obsMuni" id="obsMuni">
                <option value='1- Aguarda Cirugia'>1- Aguarda Cirugia</option>
                <option value='2- Ja Realizou no Sus'>2- Ja Realizou no Sus</option>
                <option value='3- Ja Realizou Particular'>3- Ja Realizou Particular</option>
                <option value='4- Não Deseja mais Realizar'>4- Não Deseja mais Realizar</option>
                <option value='5- Contra-Indicado o Procedimento'>5- Contra-Indicado o Procedimento</option>
                <option value='6- Sem contato'>6- Sem contato</option>
                <option value='7- Não Localizado'>7- Não Localizado</option>
                <option value='8- Óbito'>8- Óbito</option>
                <option value='10- Paciente com indicação de Uti'>10- Paciente com indicação de Uti</option>
                <option value='11. Paciente aguardando avaliação de outra especialidade'>11. Paciente aguardando avaliação de outra especialidade</option>
                <option value='12. Paciente não compareceu na data agendada da cirurgia'>12. Paciente não compareceu na data agendada da cirurgia</option>
                </select>
            </div>
        </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <label for="exampleInputCategoria">Login:</label>
                <select class="form-control" name="login" id="login">
                <option value='<?php echo $login; ?>'><?php echo $login; ?></option>
                </select>
            </div>
        </div>
</div>



<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <label for="exampleInputCategoria">CPF:</label>
                <select class="form-control" name="cpf" id="cpf">
                <option value='<?php echo $cpf; ?>'><?php echo $cpf; ?></option>
                </select>
            </div>
        </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <label for="exampleInputCategoria">Macro</label>
                <select class="form-control" name="macro" id="macro">
                <option value='<?php echo $macro; ?>'><?php echo $macro; ?></option>
                </select>
            </div>
        </div>
</div>

  
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
		    </div>
		</div>
    </form>

@endsection
