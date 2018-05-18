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

      $modulos = App\Modulo::where('idtreinamento',$treinamento->idtreinamento)->get();
      $turmas = App\Turma::where('idtreinamento',$treinamento->idtreinamento)->get();
    	echo "<h1><center>" .$treinamento->nometreinamento. "</center><h1>";
    	echo "<h2> Carga Horária:  ".$treinamento->cargahoraria. "<h2>";
    	echo "<h2> Realizador :  ".$treinamento->realizador. "<h2>";
      echo "<h1><center> Módulos </center><h1>";
      ?>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Módulo</th>
        <th>Sumário</th>
        <th>Instrutor</th>
        <th>Carga Horária</th>
        <th colspan="1">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($modulos as $modulo)
      <tr>
        <td>{{$modulo['nomemodulo']}}</td>
        <td>{{$modulo['sumario']}}</td>
        <td>{{$modulo['instrutor']}}</td>
        <td>{{$modulo['cargahoraria']}}</td>
        
        <td><a href="{!! route('verModulo', ['id'=>$modulo->idmodulo]) !!}" class="btn btn-warning">Ver Mais</a></td>
      </tr>
      @endforeach

      <table class="table table-striped">
    <thead>
      <tr>
        <th>Turma</th>
        <th>Data Inicio</th>
        <th>Data Fim</th>
      </tr>
    </thead>
    <tbody>
      <?php
         echo "<h1><center> Turmas </center><h1>";
      ?>
      @foreach($turmas as $turma)
        <td alingn = "center">{{$turma['turma']}}</td>
        <td>{{$turma['dateInicio']}}</td>
        <td>{{$turma['dateFim']}}</td>
      </tr>
      @endforeach

      <div style ="position: absolute; bottom: 0;">
        <a href="/treinamento" class="btn btn-info btn-lg btn-block"> Voltar</a>
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