@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> Bienvenido a xZgZ cliente: {{ Auth::user()->name }}</h1>
        @if(Auth::user()->puntoxZgZ <=0) <button type="button" class="btn btn-primary" disabled> Directorio de empresas</button> @else
        <a href="/buscador" class="btn btn-info" role="button" >Directorio de empresas</a> @endif
        <a href="/misreservas" class="btn btn-info" role="button">Ver mis reservas</a>
        <a href="/perfilC" class="btn btn-info" role="button">Ver mi perfil</a>
        <button type="button" class="btn btn-primary" > {{ Auth::user()->puntoxZgZ }} puntos xZgZ</button>
</div>

@endsection
