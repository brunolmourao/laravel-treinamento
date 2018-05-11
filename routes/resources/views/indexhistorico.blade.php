<!-- index.blade.php -->
{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Treinameto')

@section('content_header')
    <h1>Bem Vindo !</h1>
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
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Data Inicio</th>
        <th>Data Fim</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($historicos as $hist)
      <tr>
        <td>{{$hist['turma']}}</td>
        <td>{{$hist['dateInicio']}}</td>
        <td>{{$hist['dateFim']}}</td>
        
        <td><a href="{{action('HistoricoController@edit', $hist['idhistorico'])}}" class="btn btn-warning">Editar</a></td>
        <td>
          <form action="{{action('HistoricoController@destroy', $hist['idhistorico'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Deletar</button>
          </form>
        </td>
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
