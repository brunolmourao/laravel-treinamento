<!-- index.blade.php -->
{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Treinamento')

@section('content_header')
    <h1>Lista de Modulos</h1>
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
        <th>Modulo</th>
        <th>Sumário</th>
        <th>Carga Horária</th>
        <th>Treinamento</th>
        <th colspan="2"></th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($modulos as $modulo)
      <tr>
        <?php
          $treinamento = App\Treinamento::where('idtreinamento',$modulo->idtreinamento)->first();
        ?>
        <td>{{$modulo['nomemodulo']}}</td>
        <td>{{$modulo['sumario']}}</td>
        <td>{{$modulo['cargahoraria']}}</td>
        <td>{{$treinamento['nometreinamento']}}</td>
        
        <td><a href="{!! route('verModulo', ['id'=>$modulo->idmodulo]) !!}" class="btn btn-warning">Ver</a></td>
         <td><a href="{{action('ModuloController@edit', $modulo['idmodulo'])}}" class="btn btn-warning">Editar</a></td>
        <td>
          <form action="{{action('ModuloController@destroy', $modulo['idmodulo'])}}" method="post">
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
