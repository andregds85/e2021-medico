<?php session_start(); ?>
@extends('layouts3.app')
@section('content')

<div class="container">
<!-- Passo 1 !-->
  <div class="card mb-3">
      <div class="card-body">
      <h5 class="card-title"><b>Pesquisa de pacientes utilizando código SigTap e Hospital </b></h5><br><br>


<?php 
$hospital=$_GET['hospital'];

$_SESSION["id"]=$hospital;



use App\Models\Categoria;
$hosp = categoria::all();
$m=Auth::user()->macro; 
$hosp1 = Categoria::where('id',$hospital)->get(); 
?>

      @foreach($hosp1 as $item1)
        <?php 
        echo $codHosp=$item1->id;
        echo "<br>";
        echo $nomeHosp=$item1->name;
        echo "<br>";
        echo $macroHosp=$item1->macro;

        if($macroHosp<>$m){
         echo "<script> alert('Você tentou acessar dados de outra Macro')</script>";
         echo redirect()->route('sair.index'); 
        }
    
        echo "<br>";
          echo "Sessão  H :";
          echo "<br>";
          echo "<br>";

      ?>        
       
        <h6 class="card-title"><b></b></h6>
        </div>
    </div>

       


<!-- Passo 1 !-->
  <div class="card mb-3">
      <div class="card-body">
       
    <div class="box-body">
    <form action="{{ url('sigtaphosp2') }}" method="GET" enctype="multipart/form-data" NAME="regform" onsubmit="return branco()">
        <div class="form-group">
            <label for="nome" class="col-sm-1 control-label"> SigTap</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="p_nome">
            </div>
             
                <button type="submit" class="btn btn-outline-primary">
                 pesquisar
                 </button>
    
                 
        </div>
    </form>
</div>

     



@endforeach

@endsection
