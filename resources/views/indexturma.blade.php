<!-- index.blade.php -->
{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Treinamento')

@section('content_header')
    <h1>Lista de Turmas</h1>
@stop

@section('content')
    <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    @if(Auth::check())
    <?php
      $user = Auth::user();
      $pessoa = App\Pessoa::where('matpessoas',$user->matricula)->first();
    ?>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Turma</th>
        <th>Data Inicio</th>
        <th>Data Fim</th>
        <th>Treinamento</th>
        <th colspan="2"></th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($turmas as $turma)
      <tr>
        <?php
          $treinamento = App\Treinamento::where('idtreinamento',$turma->idtreinamento)->first();
        ?>
        <td>{{$turma['turma']}}</td>
        <td>{{$turma['dateInicio']}}</td>
        <td>{{$turma['dateFim']}}</td>
        <td>{{$treinamento['nometreinamento']}}</td>
        
        <td><a href="{!! route('verTreinamento', ['id'=>$treinamento->idtreinamento]) !!}" class="btn btn-warning">Ver Treinamento</a></td>
        
        <td><a href="{!! route('turmarequest.store', ['idturma'=>$turma->idturma,'idaluno'=>$pessoa->idpessoas]) !!}" class="btn btn-warning">Inscrever</a></td>
        @if(Auth::user()->usertype == "1" || Auth::user()->usertype == "2")
         <td><a href="{{action('TurmaController@edit', $turma['idturma'])}}" class="btn btn-warning">Editar</a></td>
        <td>
          <form action="{{action('TurmaController@destroy', $turma['idturma'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Deletar</button>
          </form>
        </td>
        @endif
      </tr>
      @endforeach
      @endif

      </div>
            @if(Auth::guest())
              <div>
                <h2><center>Você precisa estar logado para acessar essa aplicação:</center></h2>
                <a href="/login" class="btn btn-info btn-lg btn-block"> Login</a>
                <h2><center> Nao possui login?</center></h2>
                <a href="/register" class="btn btn-info btn-lg btn-block"> Registrar</a>
              </div>   
            @endif
        </div>

    </tbody>
  </table>
  </div>
  </body>
</html>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
