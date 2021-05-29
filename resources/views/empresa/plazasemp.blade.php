@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> Bienvenido a xZgZ Empresa: {{ Auth::guard('empresa')->user()->name }}</h1>
        <a href="/home" class="btn btn-info" role="button">Volver</a>
        <button type="button" class="btn btn-primary">Ver mis reservas</button>
        <a href="/perfilC" class="btn btn-info" role="button">Ver mi perfil</a>
    </div>
    <br>
    <div class="container">
        @foreach($plazas as $plaza)
            <div class="card">
                <h5 class="card-header">Plaza nº: {{$plaza ->idplaza}}</h5>
                <div class="card-body">
                    <h5 class="card-title">Capacidad: {{$plaza ->capacidad}}</h5>
                    <h5 class="card-title">Fecha Inicio: {{$plaza ->inicio}}</h5>
                    <h5 class="card-title">Fecha Final: {{$plaza ->final}}</h5>
                </div>
            </div>
            <br>
        @endforeach
    </div>
    <a href="/empresa/crearplazas" class="btn btn-info" role="button">Añadir una nueva plaza</a>
    <a href="/empresa/crearplazas" class="btn btn-info" role="button">Ver plazas expiradas</a>
@endsection
