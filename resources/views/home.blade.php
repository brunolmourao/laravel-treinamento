@extends('adminlte::page')

@section('title', 'Treinamento')

@section('content_header')
    <h1>Treinamento</h1>
@stop

@section('content')
<?php
	$user = Auth::User();
 	echo "<h2><center> Bem Vindo!! <center><h2>";
 	echo "<h2>".$user->name."<h2>";
    ?>
@stop