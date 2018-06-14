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
      $professores = App\Professor::where('idmodulo',$modulo->idmodulo)->get();
    	echo "<h1><center>" .$modulo->nomemodulo. "</center><h1>";
    	echo "<h2> Sumário:  ".$modulo->sumario. "<h2>";
      echo "<h2>Carga Horária: " .$modulo->cargahoraria. "<h2>";
      echo "<h2> Esse módulo pertençe ao treinamento :".$treinamento->nometreinamento."<h2>";
      $filepath ="storage/".$modulo->nomemodulo.".".$modulo->idtreinamento.".pdf";
      ?>
      <a href="{!! route('verTreinamento', ['id'=>$treinamento->idtreinamento]) !!}" class = "btn btn-info">Ver mais sobre Treinamento</a>    
      <a href="{{asset("$filepath")}}" download class = "btn btn-info"> Download Objetivo</a>
    <table class="table table-striped">
        <caption>Instrutores</caption>
    <thead>
      <tr>
        <th>Professor</th>
        <th>Email</th>
        <th colspan="1"></th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($professores as $prof)
      <tr>
        <?php
          $pessoa = App\Pessoa::where('idpessoas',$prof->idpessoas)->first();
        ?>
        <td>{{$pessoa['nomepessoa']}}</td>
        <td>{{$pessoa['email']}}</td>
        <td><a href="{!! route('verProfessor', ['id'=>$prof->idpessoas]) !!}" class="btn btn-warning">Ver Mais</a></td>
      </tr>
      @endforeach
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