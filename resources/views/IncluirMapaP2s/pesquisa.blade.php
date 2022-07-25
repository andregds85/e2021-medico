@extends('layouts3.app')
@section('content')


<SCRIPT> 
<!--
function valida()
{
    
    /* Valida do Formulário Acesso Venoso Central */ 
    if (document.pesq.grupo_chk[].value.length == 0 )   
    {
    alert('Selecione um Paciente ');
    pesq.grupo_chk[].focus();
    return false;
    }

return true;
}
//-->
</SCRIPT>



<div class="container">

<!-- Passo 1 !-->
  <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title"><b>Lista de pacientes sem mapas </b></h5>
  

    <?php
$nome=$_GET['p_nome'];

use App\Http\Controllers\PacienteController;
use App\Models\Pacientes;

$tabela = Pacientes::all();
$tabela2 = Pacientes::where('codigo', 'LIKE', '%' . $nome . '%')->get();
$tab = Pacientes::where('statusSolicitacao','S')->get(); 


?> 
        
    <div><td>Macro:</td><td> {{ Auth::user()->macro}}</td> </div>
    <?php $m=Auth::user()->macro; ?>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif



    <?php
    use App\Models\Categoria;
    $tabela = categoria::all();
    ?>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Codigo</th>
            <th>Hospital</th>
        </tr>
<?php

/*$itensP = pacientes::where('macro',$m)->get(); */
 $itensP = Pacientes::select("*")
->where([
['codigo', 'LIKE', '%' . $nome . '%'],

["macro", "=", "$m"],
["statusSolicitacao","N"]

])->get();
?>	

<form action="{{route('incluirMapaP2s.create') }}"  method="GET" enctype="multipart/form-data" NAME="pesq" onsubmit="return valida()">


<?php 
$m=Auth::user()->macro;

use App\Models\mapas;
$tabelaMapa = mapas::all();
$tabelaM = mapas::where('macro',$m)->get();
?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <label for="exampleInputCategoria">id do Mapa / Id do Hospital / Nome do Mapa</label>
                <select class="form-control" name="idMapa" id="mySelect" onchange="myFunction()">
                <option> Escolha o Mapa</option>
               
                @foreach ($tabelaM as $mapas)
                <option value='{{$mapas->id }}'> {{$mapas->id }} {{$mapas->categoria_id}}{{$mapas->nome }}</option>

                @endforeach
                </select>
            </div>
        </div>
</div>



    @foreach ($itensP as $paciente)
	    <tr>
            <td>
            <input type="checkbox" name="grupo_chk[]" value='{{$paciente->id}}'>
         </td>
           
            <?php $selected='grupo_chk[]'; ?>                 
    
            <td>{{$paciente->codigo }}</td>
            <?php $a=$paciente->categorias_id; ?>

                @foreach($tabela as $item)
               <?php $b=$item->id; ?>
               <?php $c=$item->name; ?>
               <?php $macroCategoria=$item->macro; ?>
       
              <?php
                if($b==$a){
                    echo "<td>";
                    echo "$c";
                } ?>
       
       @endforeach
  
    </td>
	    </tr>
	    @endforeach
    </table>

       <input type="submit" name="Enviar" value="Cadastrar">
</form>

@endsection
</div>

<h6 class="card-title"><b></b></h6>
        </div>
    </div>

