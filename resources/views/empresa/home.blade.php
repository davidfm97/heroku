@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> Bienvenido a xZgZ Empresa: {{ Auth::guard('empresa')->user()->name }}</h1>
        <a href="/empresa/plazas" class="btn btn-info" role="button">Gestionar plazas</a>
        <a href="/empresa/misreservas" class="btn btn-info" role="button">Ver mis reservas</a>
        <a href="/empresa/verificarQR" class="btn btn-info" role="button">Verificar QR</a>
    </div>
@endsection
