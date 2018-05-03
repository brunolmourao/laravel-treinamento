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
        <th>ID</th>
        <th>Nome</th>
        <th>Matricula</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Whatsapp</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($pessoas as $pessoa)
      <tr>
        <td>{{$pessoa['idpessoas']}}</td>
        <td>{{$pessoa['nomepessoa']}}</td>
        <td>{{$pessoa['matpessoas']}}</td>
        <td>{{$pessoa['email']}}</td>
        <td>{{$pessoa['celular']}}</td>
        <td>{{$pessoa['whatsapp']}}</td>
        
        <td><a href="{{action('PessoasController@edit', $pessoa['idpessoas'])}}" class="btn btn-warning">Editar</a></td>
        <td>
          <form action="{{action('PessoasController@destroy', $pessoa['idpessoas'])}}" method="post">
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
                <a href="/login" class="btn btn-info"> Você precisa estar logado para ter acesso a essa aplicação  >></a>
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
