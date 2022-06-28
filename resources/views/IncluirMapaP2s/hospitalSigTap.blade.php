@extends('layouts3.app')
@section('content')
<?php 
$hospital=$_GET['hospital'];
$hospital;

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
      
      
      ?>        
        



        
        @endforeach







@endsection
