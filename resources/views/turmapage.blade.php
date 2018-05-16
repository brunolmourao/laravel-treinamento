{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Treinamento')

@section('content')
	 @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
     @if(Auth::check())
      <?php

      $treinamento = App\Treinamento::where('idtreinamento',$turma->idtreinamento)->first();
    	echo "<h1>" .$turma->turma. "<h1>";
    	echo "<h2> Data Inicio:  ".$turma->dateInicio. "<h2>";
    	echo "<h2> Data Final :  ".$turma->dateFim. "<h2>";

      echo "<h2> Ver mais sobre o Treinamento: ".$treinamento->nometreinamento. "<h2>"
      ?>

      <a href="/" class="btn btn-info btn-lg btn-block"> Ver Mais</a>

      <a href="/" class="btn btn-info btn-lg btn-block"> Voltar</a>
	
    @endif
    @if(Auth::guest())
       	<div>
            <h1><center>Você precisa estar logado para acessar essa aplicação:</center></h1>
            <a href="/login" class="btn btn-info btn-lg btn-block"> Login</a>
            <h1><center> Nao possui login?</center></h1>
            <a href="/register" class="btn btn-info btn-lg btn-block"> Registrar</a>
         </div>   
     @endif
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop