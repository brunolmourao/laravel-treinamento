<!-- index.blade.php -->
{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Treinamento')

@section('content_header')
    <h1>Lista de Usuários</h1>
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
        <th>Matricula</th>
        <th>Email</th>
        <th>Tipo de Usuário</th>
        <th colspan="2"></th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($users as $user)
      <tr>
        <?php
            $tipo = 'Aluno';
            if($user->usertype == 1){
                $tipo = 'Admin';
            }
            if($user->usertype == 2){
                $tipo = 'Professor';
            }
        ?>
        <td>{{$user['name']}}</td>
        <td>{{$user['matricula']}}</td>
        <td>{{$user['email']}}</td>
        <td>{{$tipo}}</td>  
        <td><a href="{!! route('user.edit', ['id'=>$user->id]) !!}" class="btn btn-warning">Tornar Professor</a></td>
        <td><a href="{!! route('user.changeToAdmin', ['id'=>$user->id]) !!}" class="btn btn-warning">Tornar Admin</a></td>
        <td><a href="{!! route('user.changeToAluno', ['id'=>$user->id]) !!}" class="btn btn-warning">Tornar Aluno</a></td>
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
