@extends('limpo.app')
@section('content')
<?php


use App\Models\regulador;
use App\Models\Pacientes;

use App\Http\Controllers\reguladorController;
use App\Http\Controllers\PacienteController;

$idPaciente=$_GET['idp2'];
$idPaciente;

$obs=$_GET['obs'];
$obs;

$avfinal=$_GET['avfinal'];
$avfinal;

$login=$_GET['usuarioSistema'];
regulador::insert(['id_paciente' => $idPaciente,'obs' => $obs,'avfinal' => $avfinal,'login' => $login]); 
?>

<script>
 {
  alert("Sucesso\nOperação Efetuada com Sucesso");
}
</script>

<?php

Pacientes::where('id',$idPaciente)->update(['statusSolicitacao' => $avfinal]);  

?>
<script>
 {
  alert("Sucesso\nResolvido esse Paciente");
}
</script>


<body onload='window.history.back();'>
@endsection


