@extends('layouts.app')



@section('content')
    <div class="container">
        <div>
            <h1>Perfil de {{ Auth::user()->name }}</h1>
        </div>
        <a href="/home" class="btn btn-info" role="button">Volver</a>
        @if(Auth::user()->puntoxZgZ <=0) <button type="button" class="btn btn-primary" disabled> Directorio de empresas</button> @else
            <a href="/buscador" class="btn btn-info" role="button" >Directorio de empresas</a> @endif
        <a href="/misreservas" class="btn btn-info" role="button">Ver mis reservas</a>
        <button type="button" class="btn btn-primary" > {{ Auth::user()->puntoxZgZ }} puntos xZgZ</button>
    </div>
    <br>
    <div class="container">
        <h2>Actualmente los datos de tu cuenta son:</h2>
        <table class="table table-hover table-light">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Contraseña (cifrada por seguridad)</th>
                <th>Fecha de creación</th>
                <th>Fecha de última actualización</th>
                <th>Puntos disponibles</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ Auth::user()->name }}</td>
                <td>{{ Auth::user()->email }}</td>
                <td>{{ Auth::user()->password }}</td>
                <td>{{ Auth::user()->created_at }}</td>
                <td>{{ Auth::user()->updated_at }}</td>
                <td>{{ Auth::user()->puntoxZgZ }}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="container">
        <h2>Para cambiar los datos de tu cuenta, rellena el siguiente formulario:</h2>
        <form action="{{route('editarCliente',[$cliente])}}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Guardar cambios') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
    </div>

@endsection
