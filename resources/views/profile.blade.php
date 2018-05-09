{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Treinamento')

@section('content_header')
    <h1>Perfil</h1>
@stop

@section('content')
	 @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
     @if(Auth::check())
    <?php
    	$user = Auth::User();
      $pessoas = App\Pessoa::where('matpessoas',$user->matricula)->get();
      $pessoa = $pessoas[0];
    	echo "<h2> Nome do Usuario:  ".$user->name. "<h2>";
    	echo "<h2> Matricula:  ".$user->matricula. "<h2>";
    	echo "<h2> Email:  ".$user->email. "<h2>";
    	echo "<h2> Telefone:  ".$user->phoneNumber. "<h2>";
    	echo "<h2> Whatsapp:  ".$user->whatsapp. "<h2>";
    ?>
    <div style ="position: absolute; bottom: 0;right:0;">
    	<a href="{{action('PessoasController@edit', $pessoa['idpessoas'])}}" class="btn btn-primary btn-block"> Alterar Attributos </a>
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