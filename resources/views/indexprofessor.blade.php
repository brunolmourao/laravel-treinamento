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
        <th>Id</th>
        <th>Professor</th>
        <th>Treinamento</th>
        <th>Modulo</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($professores as $prof)
      <tr>
        <?php
          $pessoa = App\Pessoa::find($prof->idpessoas);
          $modulo = App\Modulo::where('idmodulo',$prof->idmodulo)->first();
          $treinamento = App\Treinamento::where('idtreinamento',$modulo->idtreinamento)->first();
        ?>
        <td>{{$prof['idprofessor']}}</td>
        <td>{{$pessoa['nomepessoa']}}</td>
        <td>{{$treinamento['nometreinamento']}}</td>
        <td>{{$modulo['nomemodulo']}}</td>
        
        <td><a href="{!! route('verProfessor', ['id'=>$prof->idprofessor]) !!}" class="btn btn-warning">Ver Mais</a></td>
        @if(Auth::user()->usertype == "1" || Auth::user()->usertype == "2")
        <td>
          <form action="{{action('ProfessorController@destroy', $prof['idprofessor'])}}" method="post">
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
