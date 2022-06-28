@extends('layouts2.app')
@section('content')

<?php
use App\Http\Controllers\MapasController;
use App\Models\mapas;


$tabela = mapas::all(); 
$itens = mapas::where('id',$id)->get();
?>
    <?php $hospUsr=Auth::user()->categorias_id; ?> 


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Detalhamento do Mapa</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('mapas.index') }}"> Voltar</a>
            </div>
        </div>
    </div><br><br>

    @foreach ($itens as $mapa)
  
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Id:</strong>
                {{ $mapa->id }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Macro:</strong>
                {{$mapa->macro}}
            </div>
        </div>







        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hospital:</strong>
                {{$mapa->categoria_id}}
            </div>
        </div>

        <?php   $hospital=$mapa->categoria_id; 

        if ($hospital <> $hospUsr){
                            ?>
      
            <script>
            window.location.href = "/";
            </script>

            <?php
            } ?>





        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome do Mapa:</strong>
                {{ $mapa->nome }}
            </div>
        </div>
<?php   $hospital=$mapa->categoria_id; 

        if ($hospital <> $hospUsr){
         ?>
              
    <script>
        window.location.href = "/";
    </script>

        <?php
        } ?>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição:</strong>
                {{$mapa->descricao}}
            </div>
        </div>
       
       
       
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Especialidade:</strong>
                {{$mapa->especialidade}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Código do Procedimento:</strong>
                {{$mapa->cod_procedimento}}
            </div>
        </div>



        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Procedimento:</strong>
                {{$mapa->procedimento}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Vagas:</strong>
                {{$mapa->vagas}}
            </div>
        </div>



        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Login:</strong>
                {{$mapa->login}}
            </div>
        </div>


                
      
    
	      
 @endforeach

@endsection

