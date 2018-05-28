{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Treinamento')

@section('content_header')
    <h1>Professor</h1>
@stop

@section('content')
	 @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
     @if(Auth::check())
      <?php
      $pessoa = App\Professor::find($professor->idprofessor)->pessoa;
      $modulos = App\Modulo::where('idmodulo',$professor->idmod);
    	echo "<h2> Nome do Professor:  ".$pessoa->nomepessoa. "<h2>";
    	echo "<h2> Matricula:  ".$pessoa->matpessoas. "<h2>";
    	echo "<h2> Email:  ".$pessoa->email. "<h2>";
    	echo "<h2> Telefone:  ".$pessoa->celular. "<h2>";
    	echo "<h2> Whatsapp:  ".$pessoa->whatsapp. "<h2>";
      echo "<h2><center> Módulos <center><h2>"
      ?>

      <table class="table table-hover" align="right">
      <thead>
        <tr>
          <th>Nome Modulo:</th>
          <th>Carga Horária:</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      
      @foreach($modulos as $mod)
      <tr>
        <td>{{$mod['nomemodulo']}}</td> 
        <td>{{$mod['cargahoraria']}}</td>
        <td><a href="{!! route('verModulo', ['id'=>$mod->idmodulo]) !!}" class="btn btn-primary">Ver Mais</a></td>
      </tr>
      @endforeach
    </tbody>
   </table>     	
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