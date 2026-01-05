@extends('layouts.admin')

@section('content')
        <h1>Bienvenidos a miGestion - {{ Auth::user()->name }}</h1>

@endsection