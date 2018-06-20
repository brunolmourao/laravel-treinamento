<!-- edit.blade.php -->
{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Treinamento')

@section('content_header')
    <h1>Editar Módulo</h1>
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
        <form method="post" action="{{action('ModuloController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Sumario">Sumario:</label>
            <input type="text" class="form-control" name="sumario" value="{{$modulo->sumario}}">
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
              <label for="cargahoraria">Carga Horária::</label>
              <input type="text" class="form-control" name="cargahoraria" value="{{$modulo->cargahoraria}}">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
            <a href="{{action('ModuloController@index')}}" class="btn btn-warning">Voltar</a>
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
