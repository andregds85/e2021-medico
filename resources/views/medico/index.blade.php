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
use App\Http\Controllers\mapahospitalController;

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
                <form action="" method="POST" id="validate" enctype="multipart/form-data" NAME="regform"
    onsubmit="return valida()">

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
                            <label for="idp2" class="col-md-4 col-form-label text-md-right">{{ __('Referencia do Paciente no Mapa ') }}</label>
                            <div class="col-md-6">
                            <input id="idp2" type="text" class="form-control @error('idp2') is-invalid @enderror" name="idp2"  value="" required autocomplete="idp2" readonly>
                                @error('idp2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       </div>
                 

                     <!-- ID do Paciente -->
                       <div class="form-group row">
                            <label for="idPaciente" class="col-md-4 col-form-label text-md-right">{{ __('Id do Paciente') }}</label>
                            <div class="col-md-6">
                            <input id="idPaciente" type="text" class="form-control @error('idPaciente') is-invalid @enderror" name="idPaciente"  value="" required autocomplete="idPaciente" readonly>
                                @error('idPaciente')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       </div>
                 
                       

                                          
                    <!--  passo 1 -->
                       <div class="form-group row">
                            <label for="cpf" class="col-md-4 col-form-label text-md-right">{{ __('Observação') }}</label>
                            <div class="col-md-6">
                            <select class="form-control" name="observacao" id="confirma">
                              <option value='Defina uma observação' >Defina uma observação</option>
                              <option value='1. Aguarda cirurgia' >1. Aguarda cirurgia</option>
                              <option value='2. Já realizou no SUS' >2. Já realizou no SUS</option>
                              <option value='3. Já realizou particular' >3. Já realizou particular</option>
                              <option value='4. Não deseja mais realizar' >4. Não deseja mais realizar</option>
                              <option value='5. Contra-indicado o procedimento' >5. Contra-indicado o procedimento</option>
                              <option value='6. Sem contato' >6. Sem contato</option>
                              <option value='7. Não localizado' >7. Não localizado</option>
                              <option value='8. Óbito' >8. Óbito</option>
                              <option value='9. Termo de desistência assinado' >9. Termo de desistência assinado</option>
                              <option value='10. Paciente com indicação de UTI' >10. Paciente com indicação de UTI</option>
                              <option value='11. Paciente aguardando avaliação de outra especialidade' >11. Paciente aguardando avaliação de outra especialidade</option>
                              <option value='12. Paciente não compareceu na data agendada da cirurgia' >12. Paciente não compareceu na data agendada da cirurgia</option>
                           

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

