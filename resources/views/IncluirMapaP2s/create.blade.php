@extends('limpo.app')
@section('content')

<div class="container">

<?php

$idMapa=$_GET['idMapa'];
print_r ($rec=$_GET['grupo_chk']);

$m=Auth::user()->macro;

use App\Models\Pacientes;
$tabela = Pacientes::all();
$itensP = Pacientes::where('id',$rec)->get();

use App\Models\incluir_mapa_p2;

?>
@foreach ($itensP as $paciente)
<?php $mpac=$paciente->macro; ?>
@endforeach 
<?php   
if($mpac<>$m){
    session()->flush();
}?> 


<?php 
use App\Models\mapas;
$tabelaMapa = mapas::all();
$tabelaM = mapas::where('macro',$m)->get();
           

foreach( $rec as $paciente ) {

      echo $paciente;
      echo "<br>";
      $b="<p id='demo'></p>";
      echo $b; 


      DB::table('incluir_mapa_p2s')->insert([
	    ['idMapa' => $idMapa, 'idPaciente' => $paciente,'macro'=>$m],
	    ]);
      Pacientes::where('id',$paciente)->update(['statusSolicitacao' => 'S']);   
}
?>
  


@endsection

</div>