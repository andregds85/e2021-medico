@extends('limpo.app')
@section('content')
<?php 
$id;
$id1=Crypt::decrypt($id);
echo "<br>";
echo "ID do Paciente :";
echo $id1;
echo "<br>";

use App\Models\mapahospital;
use App\Models\medicoRegulador;

use App\Http\Controllers\mapahospitalController;
use App\Http\Controllers\medicoReguladorController;


$tab = mapahospital::all();
$hosp = mapahospital::where('idPaciente',$id1)->get();

?>
@foreach ($hosp as $o1)
Id Referencia:{{$o1->idp3 }}<br>
Prontuário do Hospital:{{$o1->prontuarioHospital }}<br>
Data da Cirurgia:{{$o1->prontuarioHospital }}<br>
Observação do Hospital:{{$o1->obsHospital }}<br>
<b>Realizou Cirurgia Sim / Não : </b><font color="blue"> {{$o1->realizou }} </font><br>
<?php

$rest = substr($o1->realizou, 0, 1); 

 if($rest=="N"){
  echo '<script language="javascript">alert("Realizou Cirurgia Sim / Não :Não ");</script>';  
  echo '<script language="javascript">alert("Você retornará a página anterior ");</script>';  

  echo  "<body onload='window.history.back();'>";
 }else{
 echo  "Deu tudo Certo";
 }

?>
<br>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Formulario do Médico Regulador') }}</div>
    <div class="card-body">
    <form  method="POST">
                       
                @csrf
                     
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                   
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dados do Mapa') }}</div>
                <div class="card-body">

                  <!-- idp2 -->
                     <div class="form-group row">
                            <label for="idp2" class="col-md-4 col-form-label text-md-right">{{ __('ID do Paciente ') }}</label>
                            <div class="col-md-6">
                            <input id="idp2" type="text" class="form-control @error('idp2') is-invalid @enderror" name="idp2"  value="<?php  echo $id1; ?>"  required autocomplete="idp2" readonly>
                                @error('idp2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       </div>
                 

                       <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                             <strong>Observacao: </strong>
                         <textarea class="form-control" style="height:150px" name="obs" placeholder="Obs"></textarea>
                         </div>
                       </div>
                     </div>
                 
               
                                          
                    <!--  passo 1 -->
                       <div class="form-group row">
                            <label for="cpf" class="col-md-4 col-form-label text-md-right">{{ __('Avaliação Final') }}</label>
                            <div class="col-md-6">
                            <select class="form-control" name="avfinal" id="avfinal">
                              <option value='pendente'>Pendente</option>
                              <option value='aprovado'>Aprovado</option>
                              <option value='devolvido'>Devolvido</option>
                              <option value='reenviado'>Reenviado</option>
                              <option value='negado'>Negado</option>
                            </select>     
                                @error('passo1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
 
                        </div>

                  
                    <!--  login 1 -->
                    <div class="form-group">
                      <label for="exampleInputCategoria">Login </label>
                  <select class="form-control" name="usuarioSistema"> 
                      <option value='' >{{Auth::user()->email}}</option>
                    </select>
                     </div>
                   </div>
                        </div>
                        </div>
                        </div>
                        </div>
                   
<!--  fim -->
                            <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endforeach
@endsection

