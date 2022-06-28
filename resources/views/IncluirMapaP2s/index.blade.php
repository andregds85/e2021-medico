@extends('layouts3.app')
@section('content')

<SCRIPT> 
<!--
function valida()
{
        
   /* Valida do Formulário Acesso Venoso Central */ 
    if (document.pesquisa.idMapa.value.length == 0 )   
    {
    alert('Está pesquisando um Código, então escolha essa opção no Mapa ');
    pesquisa.idMapa.focus();
    return false;
    }



    return true;
}
//-->
</SCRIPT>






<script>
function onlynumber(evt) {
   var theEvent = evt || window.event;
   var key = theEvent.keyCode || theEvent.which;
   key = String.fromCharCode( key );
   //var regex = /^[0-9.,]+$/;
   var regex = /^[0-9.]+$/;
   if( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
   }
}
</script>



<div class="container">
<!-- Passo 1 !-->
  <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title"><b>Lista de pacientes sem mapas </b></h5><br><br>
        <h6 class="card-title"><b></b></h6>
        </div>
    </div>
</div>



<div class="container">
<!-- Passo 1 !-->
  <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title"><b>Pesquisa de pacientes utilizando código SigTap e Hospital </h5><br>
        <h5 class="card-title"><b>Passo 1 - Selecione o Hospital / 2  </h5>

<br><br>


<?php
    use App\Models\Categoria;
    $hosp = categoria::all();
?>

<div><td>Macro:</td><td> {{Auth::user()->macro}}</td> </div>
<?php $m=Auth::user()->macro; ?>
<?php $hosp1 = Categoria::where('macro',$m)->get(); ?> 

<div class="form-group">


<!-- Formulario 1 -->
<form action="{{ url('/sigtaphosp') }}" method="GET" enctype="multipart/form-data" NAME="outro">

    <label for="exampleFormControlSelect1">Hospital</label>
    <select class="form-control" id="exampleFormControlSelect1" name='hospital'>
      <option>Escolha o Hospital</option>
      @foreach($hosp1 as $item1)
        <option value='{{ $item1->id }}'>{{ $item1->id}}{{ $item1->name }}</option>
        @endforeach
    </select>
  </div>
 


  <div class="form-group">

  </div>

  <input type="submit" class="btn btn-outline-primary"  value="Selecione o Hospital ">
       
  <h6 class="card-title"><b></b></h6>
        </div>
    </div>
</div>
</form>

<!-- Encerrando o Formulario 1 -->




<SCRIPT> 
<!--
function branco()
{
        
 if(document.regform.p_nome.value==""  || document.regform.p_nome.value.length < 5)   

{
alert( "Digite o Codigo Sigtap");
regform.p_nome.focus();
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
       
    <div class="box-body">
    <form action="{{ url('pesquisar') }}" method="GET" enctype="multipart/form-data" NAME="regform" onsubmit="return branco()">
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





    <div><td>Macro:</td><td> {{ Auth::user()->macro}}</td> </div>
    <?php $m=Auth::user()->macro; ?>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <?php
    use App\Models\Pacientes;
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
["statusSolicitacao", "=", 'N'],
["macro", "=", "$m"]
])->get();
?>	

<form action="{{route('incluirMapaP2s.create') }}" method="get" name="pesquisa"  onsubmit="return valida()">

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
                <option></option>
                <option>Estou Pesquisando um código sigtap</option>
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
    <br>


       <input type="submit" class="btn btn-outline-primary" name="Enviar" value="Cadastrar">
</form>

@endsection
</div>


<h6 class="card-title"><b></b></h6>
        </div>
    </div>



