@extends('layouts.app')



@section('content')
    <div class="container">
        <div>
            <h1>Bienvenido al directorio de empresas</h1>
        </div>
        <a href="/home" class="btn btn-info" role="button">Volver</a>
        @if(Auth::user()->puntoxZgZ <=0) <button type="button" class="btn btn-primary" disabled> Directorio de empresas</button> @else
            <a href="/buscador" class="btn btn-info" role="button" >Directorio de empresas</a> @endif
        <a href="/perfilC" class="btn btn-info" role="button">Ver mi perfil</a>
        <button type="button" class="btn btn-primary" > {{ Auth::user()->puntoxZgZ }} puntos xZgZ</button>
        <br>
        <a href="/misreservas" class="btn btn-info" role="button">Reservas pendientes</a>
        <a href="/misreservasverificadas" class="btn btn-info" role="button">Reservas verificadas</a>
    </div>
    <br>
    <div class="container">
        @forelse($reservas as $reserva)
            <div class="card border-danger">
                <div class="card-header">Reserva nª: {{$reserva ->id}}</div>
                <div class="card-body text-danger">
                    <h5 class="card-title">Reserva para : {{$reserva->num_personas}} personas.</h5>
                    <p class="card-text">Fecha de inicio de la reserva: {{$plazas[$reserva->id] ->inicio}}</p>
                    <p class="card-text">Fecha de final de la reserva: {{$plazas[$reserva->id] ->final}}</p>
                    <p class="card-text">Lugar de la reserva: {{$empresas[$plazas[$reserva->id]->idplaza]->name}}</p>
                    <p class="card-text">Información de contacto: {{$empresas[$plazas[$reserva->id]->idplaza]->email}}</p>
                    <p class="card-text">Has perdido 100 puntos xZgZ por esta reserva</p>
                </div>
            </div>
            <br>
        @empty
            <div>
                <h3>Parece que no tienes reservas verificadas.</h3>
            </div>
        @endforelse
    </div>


@endsection
