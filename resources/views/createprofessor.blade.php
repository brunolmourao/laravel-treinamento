{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Treinamento')

@section('content_header')
    <h1>Atribuir Professor</h1>
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
      <form method="post" action="{{url('professor')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="col-md-4"></div>
          <label for="Matriculadrop">Matricula do Professor:</label>  
          <select id="category" name="matricula" class="selectpicker">
          <option value="">Selecione o Professor:</option>
          @foreach($professores as $key => $value)
            <option value="{{$value->matricula}}">{{$value->matricula}}</option>
          @endforeach
          </select>
        </div>
        <div class="row">
        <div class="col-md-4"></div>
          <label for="Modulosdrop">Modulo:</label>  
          <select id="category" name="modulo" class="selectpicker">
          <option value="">Selecione o Modulo:</option>
          @foreach($modulos as $key => $value)
            <option value="{{$value->nomemodulo}}">{{$value->nomemodulo}}</option>
          @endforeach
          </select>
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
            <a href="{{action('ProfessorController@index')}}" class="btn btn-default">Voltar</a>
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

