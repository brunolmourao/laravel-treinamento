<!-- index.blade.php -->
@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Aplicação Treinamento</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
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
      <tr><a href="{{action('PessoasController@create')}}" class="btn btn-warning">Adicionar Pessoa</a></tr>
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
@endsection