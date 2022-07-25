@extends('layouts5.app')
@section('content')

<a href="https://wallacemaxters.com.br/blog/2020/03/29/laravel-como-criar-filtros-de-pesquisa-no-eloquent-de-maneira-eficiente"> Consultas de Palavras com Eloquent </a>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}

                        </div>
                    @endif
               
                    {{ __('Voce está Logodo no Sistema!') }}
               
                   <div><td>Id:</td><td> {{ Auth::user()->id}}</td> </div>
                   <div><td>Nome:</td><td> {{ Auth::user()->name}}</td> </div>
                   <div><td>Email:</td><td> {{ Auth::user()->email}}</td> </div>
                   <div><td>Hospital:</td><td> {{ Auth::user()->categorias_id}}</td> </div>
                   <div><td>Macro:</td><td> {{ Auth::user()->macro}}</td> </div>
                   <div><td>Perfil:</td><td> {{ Auth::user()->perfil}}</td> </div>


               </div>
            </div>
        </div>
    </div>
</div>
@endsection

