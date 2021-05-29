@extends('layouts.app')
@section('content')
    <div class="container">
        <div>
            <h1>Bienvenido al directorio de empresas</h1>
        </div>
        <a href="/home" class="btn btn-info" role="button">Volver</a>
        @if(Auth::user()->puntoxZgZ <=0) <button type="button" class="btn btn-primary" disabled> Directorio de empresas</button> @else
            <a href="/buscador" class="btn btn-info" role="button" >Directorio de empresas</a> @endif
        <a href="/misreservas" class="btn btn-info" role="button">Ver mis reservas</a>
        <a href="/perfilC" class="btn btn-info" role="button">Ver mi perfil</a>
        <button type="button" class="btn btn-primary" > {{ Auth::user()->puntoxZgZ }} puntos xZgZ</button>
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
                    <form action="{{ route('crearReserva',$plaza ->idplaza) }}" method="GET">
                        @csrf
                        <input type="number" class="form-control" placeholder="num_personas" name="num_personas" min="1" max="{{$plaza ->capacidad}}">
                        <button type="submit" class="btn btn-outline-dark">Reservar</button>
                    </form>
                </div>
            </div>
            <br>
        @endforeach
    </div>


@endsection
