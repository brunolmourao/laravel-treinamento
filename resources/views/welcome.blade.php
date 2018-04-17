@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">    
            @if(Auth::check())
              <a href="/create_person" class="btn btn-info"> Veja a lista de Pessoas</a>
            @endif
            @if(Auth::guest())
              <a href="/login" class="btn btn-info"> You need to login to see the list  >></a>
            @endif
        </div>
    </div>
</div>
@endsection