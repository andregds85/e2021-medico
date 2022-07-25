@extends('limpo.app')
@section('content')

<?php
session_start();
$id;
$cns=$_SESSION['cns'];
$codSolicitacao=$_SESSION['solicitacao'];
$idPaciente=$_SESSION['idPaciente'];
$idMapa=$_SESSION['idMapa'];

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('PREENCHIMENTO PELA CENTRAL DE REGULAÇÃO') }}</div>

                <div class="card-body">
                <form action="{{ route('final.store') }}" method="POST" id="validate" enctype="multipart/form-data" NAME="regform"
    onsubmit="return valida()">
                        @csrf

                 
<?php 
use App\Models\finalMaps;
use App\Http\Controllers\finalMapsController;
?>

                       </div>
                        </div>
                        </div>
                        </div>
                        </div>

    
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dados finais do Mapa ') }}</div>

                <div class="card-body">


                          <!--  id -->
                          <div class="form-group row">
                            <label for="idp4" class="col-md-4 col-form-label text-md-right">{{ __('ID') }}</label>
                            <div class="col-md-6">
                                <input id="idp4" type="text" class="form-control @error('idp4') is-invalid @enderror" name="idp4" required autocomplete="idp4" value="<?php echo $a=base64_decode($id); ?>"readonly>
                                @error('idp4')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                             


                 <!--  Observações da Central -->
                    <div class="form-group row" required>
                            <label for="metodo" class="col-md-4 col-form-label text-md-right">{{ __('Observações da Central ') }}</label>
                            <div class="col-md-6">
                            <select id="obsCentral" class="form-control" name="obsCentral">
                            <option selected></option>
                            <option value="Cirurgia realizada">Cirurgia realizada</option>
                            <option value="Solicitar termo de desistência">Solicitar termo de desistência</option>
                            <option value="Aguardando termo de desistência">Aguardando termo de desistência</option>
                            <option value="Assinado termo de desistência">Assinado termo de desistência</option>
                            <option value="Cancelar solicitação">Cancelar solicitação</option>
                            <option value="Aguardando aprovação">Aguardando aprovação</option>
                            <option value="Prioridade">Prioridade</option>
                            </select>    
                            </div>
                        </div>



                    <!-- Status do SisReg -->
                    <div class="form-group row" required>
                            <label for="metodo" class="col-md-4 col-form-label text-md-right">{{ __('Status do SisReg') }}</label>
                            <div class="col-md-6">
                            <select id="statusSisreg" class="form-control" name="statusSisreg">
                            <option selected></option>
                            <option value="Pendente">Pendente</option>
                            <option value="Aprovado">Aprovado</option>
                            <option value="Devolvido">Devolvido</option>
                            <option value="Assinado termo de desistência">Assinado termo de desistência</option>
                            <option value="Cancelar solicitação">Cancelar solicitação</option>
                            <option value="Reenviado">Reenviado</option>
                            <option value="Negado">Negado</option>
                            </select>    
                            </div>
                        </div>

                         
                          <!--  Código da solicitação  -->
                          <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Codigo da Solicitação') }}</label>
                            <div class="col-md-6">
                                <input id="codSolicitacao" type="text" class="form-control @error('codSolicitacao') is-invalid @enderror" name="codSisReg" required autocomplete="id" value="<?php echo  $codSolicitacao; ?>"readonly>
                                @error('codSolicitacao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                      <!--  cns -->
                          <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('CNS') }}</label>
                            <div class="col-md-6">
                                <input id="cns" type="text" class="form-control @error('cns') is-invalid @enderror" name="cns" required autocomplete="id" value="<?php echo $cns;   ?>"readonly>
                                @error('CNS')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                      <!--  idMapa -->
                      <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('id do Mapa') }}</label>
                            <div class="col-md-6">
                                <input id="idMapa" type="text" class="form-control @error('idMapa') is-invalid @enderror" name="idMapa" required autocomplete="idMapa" value="<?php echo $idMapa; ?>"readonly>
                                @error('idMapa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                                             
                      <!--  idPaciente -->
                      <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('id do Paciente ') }}</label>
                            <div class="col-md-6">
                                <input id="idPaciente" type="text" class="form-control @error('idPaciente') is-invalid @enderror" name="idPaciente" required autocomplete="idPaciente" value="<?php echo $idPaciente; ?>"readonly>
                                @error('idPaciente')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 










                    </div>
                        </div>
                        </div>
                        </div>
                        </div>


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
@endsection









