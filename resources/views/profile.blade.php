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
      $pessoa = App\Pessoa::where('matpessoas',$user->matricula)->first();
      $historicos = App\Historico::where('idpessoas',$pessoa->idpessoas)->get();
      echo "<h2> Nome do Usuario:  ".$user->name. "<h2>";
      echo "<h2> Matricula:  ".$user->matricula. "<h2>";
      echo "<h2> Email:  ".$user->email. "<h2>";
      echo "<h2> Telefone:  ".$user->phoneNumber. "<h2>";
      echo "<h2> Whatsapp:  ".$user->whatsapp. "<h2>";
      ?>

      <table class="table table-hover" align="right">
      <thead>
        <tr>
          <th>Nome Turma</th>
          <th>Nota</th>
          <th>Aprovado</th>
          <th>Número de Faltas</th>
          <th>Data Inicial</th>
          <th>Data Final</th>
          <th>Finalizada</th>
          <th colspan="1"></th>
        </tr>
      </thead>
      <tbody>
      
      @foreach($historicos as $hist)
      <tr>
        <?php
          $turma = App\Turma::where('idturma',$hist->idturma)->first();
          $terminada = 'Finalizada';
          $aprovado = 'Aprovado';
          if($hist->aprovado == 0 AND $hist->terminada == 0){
            $terminada = 'Cursando';
            $aprovado = 'Cursando';
          }
          if($hist->aprovado == 0 AND $hist->terminada == 1){
            $aprovado = 'Reprovado';
          }
        ?>
        <td>{{$turma['turma']}}</td> 
        <td>{{$hist['nota']}}</td>
        <td>{{$aprovado}}</td>
        <td>{{$hist['faltas']}}</td>
        <td>{{$turma['dateInicio']}}</td>
        <td>{{$turma['dateFim']}}</td>
        <td>{{$terminada}}</td>  
        <td><a href="{!! route('verTurma', ['id'=>$turma->idturma]) !!}" class="btn btn-primary">Ver Mais</a></td>
      </tr>
      @endforeach
    </tbody>
   </table>     

    <div style ="position: absolute; bottom: 0;left:50%;">
      <a href="{{action('PessoasController@edit', $pessoa['idpessoas'])}}" class="btn btn-primary btn -lg btn-block"> Alterar Atributos </a>
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