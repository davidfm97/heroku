@extends('layouts.app')



@section('content')
    <div class="container">
        <div>
            <h1>Empresas colaboradoras con xZgZ</h1>
        </div>
        <a href="/home" class="btn btn-info" role="button">Volver</a>
        <a href="/misreservas" class="btn btn-info" role="button">Ver mis reservas</a>
        <a href="/perfilC" class="btn btn-info" role="button">Ver mi perfil</a>
        <button type="button" class="btn btn-primary" > {{ Auth::user()->puntoxZgZ }} puntos xZgZ</button>
    </div>
    <br>
    <div class="container">
        @foreach($usuarios as $usuario)
            <div class="card">
                <h5 class="card-header">{{$usuario ->name}}</h5>
                <div class="card-body">
                    <h5 class="card-title">Tipo de establecimiento: {{$usuario ->tipo}}</h5>
                    <p class="card-text">Descripción general: {{$usuario ->descripcion}}</p>
                    <a href="/plazas/{{$usuario ->id}}" class="btn btn-info" role="button">Ver plazas disponibles</a>

                </div>
            </div>
            <br>
        @endforeach
    </div>


@endsection
