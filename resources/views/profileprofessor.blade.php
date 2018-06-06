{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Treinamento')

@section('content_header')
    <h1>Perfil Professor</h1>
@stop

@section('content')
	 @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
     @if(Auth::check())
     @can('professor-only')
      <?php
    	 $user = Auth::User();
      $pessoa = App\Pessoa::where('matpessoas',$user->matricula)->first();
      $professor = App\Professor::where('idpessoas',$pessoa->idpessoas)->get();
    	echo "<h2> Nome do Usuario:  ".$user->name. "<h2>";
    	echo "<h2> Matricula:  ".$user->matricula. "<h2>";
    	echo "<h2> Email:  ".$user->email. "<h2>";
    	echo "<h2> Telefone:  ".$user->phoneNumber. "<h2>";
    	echo "<h2> Whatsapp:  ".$user->whatsapp. "<h2>";
      ?>

      <table class="table table-hover" align="right">
      <thead>
        <tr>
          <th>Modulo</th>
          <th>Treinamento</th>
          <th>Sumario</th>
          <th>Carga Horária</th>
          <th colspan="1"></th>
        </tr>
      </thead>
      <tbody>
      
      @foreach($professor as $prof)
      <tr>
        <?php
          $modulo = App\Modulo::where('idmodulo',$prof->idmodulo)->first();
          $treinamento = App\Treinamento::where('idtreinamento',$modulo->idtreinamento)->first();  
        ?>
        <td>{{$modulo['nomemodulo']}}</td> 
        <td>{{$treinamento['nometreinamento']}}</td>
        <td>{{$modulo['sumario']}}</td>
        <td>{{$modulo['cargahoraria']}}</td> 
        <td><a href="{!! route('verModulo', ['id'=>$modulo->idmodulo]) !!}" class="btn btn-primary">Ver Mais</a></td>
      </tr>
      @endforeach
    </tbody>
   </table>     

    <div style ="position: absolute; bottom: 0;left:50%;">
    	<a href="{{action('PessoasController@edit', $pessoa['idpessoas'])}}" class="btn btn-primary btn -lg btn-block"> Alterar Atributos </a>
    </div>
    @else
      <h2><center>Você não tem permissão para acessar essa Página</center></h2>
      <center><a href="{{action('HomeController@index')}}" class="btn btn-warning">Voltar</a></center>
    @endcan	
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