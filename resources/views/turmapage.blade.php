{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Treinamento')
@section('content_header')
    <h1>Turma</h1>
@stop

@section('content')
	 @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
     @if(Auth::check())
      <?php

      $treinamento = App\Treinamento::where('idtreinamento',$turma->idtreinamento)->first();
    	echo "<h1><center>" .$turma->turma. "<center><h1>";
    	echo "<h2><center> Data Inicio:  ".$turma->dateInicio. "<center><h2>";
    	echo "<h2><center> Data Final :  ".$turma->dateFim. "<center><h2>";
      ?>
      <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label>Treinamento: {{{$treinamento->nometreinamento}}} </label>
            <a href="{!! route('verTreinamento', ['id'=>$treinamento->idtreinamento]) !!}" class="btn btn-info btn-lg btn-block">Ver Treinamento</a>
          </div>
        </div>
      <a href="/turma" class="btn btn-info btn-lg btn-block"> Voltar</a>
    @endif
    @if(Auth::guest())
       	<div class="form-group col-md-4" style="margin-top:60px">
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