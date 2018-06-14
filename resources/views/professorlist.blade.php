<!-- index.blade.php -->
{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Treinamento')

@section('content_header')
    <h1>Lista de Professores Cadastrados</h1>
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
        <th>Professor</th>
        <th>Matricula</th>
        <th>Email</th>
        <th colspan="1">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($professores as $prof)
      <tr>
        <?php
          $pessoa = App\Pessoa::where('matpessoas',$prof->matricula)->first();
          $professorid = App\Professor::where('idpessoas',$pessoa->idpessoas)->first();
        ?>
        <td>{{$pessoa['nomepessoa']}}</td>
        <td>{{$pessoa['matpessoas']}}</td>
        <td>{{$pessoa['email']}}</td>
        
        <td><a href="{!! route('verProfessor', ['id'=>$professorid->idprofessor]) !!}" class="btn btn-warning">Ver Mais</a></td>
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
