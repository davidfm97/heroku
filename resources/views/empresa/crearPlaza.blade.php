@extends('layouts.app')

@section('content')
    <h2 class="badge-pill badge-light">Dar de alta nuevo alumno</h2>
    <div class="container">
        <h1> Bienvenido a xZgZ Empresa: {{ Auth::guard('empresa')->user()->name }}</h1>
        <a href="/empresa/dashboard" class="btn btn-info" role="button">Volver</a>
        <button type="button" class="btn btn-primary">Ver mis reservas</button>
        <a href="/perfilC" class="btn btn-info" role="button">Ver mi perfil</a>
    </div>
    <br>
    <form action="{{ route('plaza.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="capacidad" class="text-dark">Capacidad</label>
            <input type="text" class="form-control"  name="capacidad" placeholder="Inserta la capacidad">
            <label for="inicio" class="text-dark">Inicio </label>
            <input type="datetime-local" class="form-control"  name="inicio" placeholder="Inserta la fecha inicial YYYY-MM-DD hh:mm:ss">
            <label for="final" class="text-dark">Final</label>
            <input type="datetime-local" class="form-control"  name="final" placeholder="Inserta la fecha final YYYY-MM-DD hh:mm:ss">
            <input type="hidden" class="form-control" placeholder="empresa_idempresa" name="empresa_idempresa" value="{{Auth::guard('empresa')->user()->id}}">
        </div>
        <button type="submit" class="btn btn-outline-dark">Guardar</button>
    </form>
    </div>

@endsection
