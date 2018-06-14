{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Treinamento')

@section('content_header')
    <h1>Criar Modulo</h1>
@stop

@section('content')
    <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <div class="container">
      @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
      @if(Auth::check())
      @can('professor-only')
      <form method="post" action="{{url('modulo')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Modulo">Nome Modulo :</label>
            <input type="text" class="form-control" name="nomemodulo">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Modulo">Sumario :</label>
              <input type="text" class="form-control" name="sumario">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Modulo">Ementa :</label>
              <input type="file"  name="ementa">
            </div>
          </div>
           <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Modulo">Carga Horária :</label>
              <input type="number"  name="cargahoraria">
            </div>
          </div>
        <div class="row">
        <div class="col-md-4"></div>
          <label for="Treinamentodrop">Treinamento:</label>  
          <select id="category" name="treinamento" class="selectpicker">
          <option value="">Selecione o Treinamento:</option>
          @foreach($treinamentos as $key => $value)
            <option value="{{$value->nometreinamento}}">{{$value->nometreinamento}}</option>
          @endforeach
          </select>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{action('ModuloController@index')}}" class="btn btn-default">Voltar</a>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
@else
  <h2><center>Você não tem permissão para acessar essa Página</center></h2>
  <center><a href="{{action('HomeController@index')}}" class="btn btn-warning">Voltar</a></center>
@endcan
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

