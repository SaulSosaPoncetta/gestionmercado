@extends('layouts.admin')

@section('contenido')
<div id="error">


        <div class="error-page container">
            <div class="col-md-8 col-12 offset-md-2">
                <img class="img-error" src="assets/images/samples/error-404.png" alt="Not Found">
                <div class="text-center">
                    <h1 class="error-title">PAGINA NO ENCONTRADA</h1>
                    <p class='fs-5 text-gray-600'>La página que estás buscando no se encontró.</p>
                    <a href="{{ route('admin') }}" class="btn btn-lg btn-outline-primary mt-3">Inicio</a>
                </div>
            </div>
        </div>


    </div>
@endsection