@extends('layout')
@section('title','Dashboard')
@section('content')
    <h1>BIENVENID@ <b> {{$user->name}} </b> {{$user->age}}</h1>
@endsection
