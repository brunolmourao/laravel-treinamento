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
      $treinamento = App\Treinamento::where('idtreinamento',$modulo->idtreinamento)->first();
    	echo "<h1><center>" .$modulo->nomemodulo. "</center><h1>";
    	echo "<h2> Sumário:  ".$modulo->sumario. "<h2>";
    	echo "<h2> Instrutor :  ".$modulo->instrutor. "<h2>";
      echo "<h2>Carga Horária: " .$modulo->cargahoraria. "<h2>";
      echo "<h2> Esse módulo pertençe ao treinamento :".$treinamento->nometreinamento."<h2>";
      ?>
      <div>
        <a href="{!! route('verTreinamento', ['id'=>$treinamento->idtreinamento]) !!}">Ver mais sobre Treinamento</a>
      </div>
      <div style ="position: absolute; bottom: 0;">
        <a href="/" class="btn btn-info btn-lg btn-block"> Voltar</a>
	     </div>
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