@extends('layouts3.app')
@section('content')
<?php 
use App\Models\mapas;
use App\Http\Controllers\MapasController;
use App\Http\Controllers\mapahospitalController;

use App\Models\incluir_mapa_p2;
use App\Models\mapahospital;
use App\Models\municipio_mapa_p3;
use App\Models\Pacientes;

$macro=Auth::user()->macro; 

$tabela = mapas::all(); 
$itensP = mapas::where('macro',$macro)->get(); 

$tabelap2 = incluir_mapa_p2::all(); 
$itensP2 =  incluir_mapa_p2::where('macro',$macro)->get(); 
?>


<?php $hospUsr=Auth::user()->categorias_id; ?> 


<?php
session_start();
$id=$_SESSION['id'];
pacientes::find($id)->update(['statusSolicitacao' => 'S']);  



?>



<div class="alert alert-light" role="alert">
Paciente do ID <?php echo $id; ?> Retira da Lista e Incluso no Mapa
</div>

</h1>




      <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
  </html>


@endsection

