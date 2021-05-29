@extends('layouts.app')



@section('content')
    <script type="text/javascript" src="instascan.min.js"></script>
    <div class="container">
        <div>
            <h1>Bienvenido al directorio de empresas</h1>
        </div>
        <a href="/home" class="btn btn-info" role="button">Volver</a>
        <button type="button" class="btn btn-primary">Ver mis reservas</button>
        <button type="button" class="btn btn-primary">Ver mi perfil</button>
    </div>
    <br>
    <div class="container">
    @foreach($reservas as $reserva)
            <div class="card">
                <h5 class="card-header">Reserva nª: {{$reserva ->id}}</h5>
                <div class="card-body">
                    <h5 class="card-title">Reserva a nombre : {{$clientes[$reserva->id]->name}}</h5>
                    <h5 class="card-title">Contacto con el cliente : {{$clientes[$reserva->id]->email}}</h5>
                    <h5 class="card-title">Reserva para : {{$reserva->num_personas}} personas.</h5>
                    <h5 class="card-title">@foreach($plazas as $plaza) @if($plaza->idplaza == $reserva->plaza_idplaza) Se ha reservado la plaza nº: {{$plaza->idplaza}} <br>
                        La reserva empieza: {{$plaza->inicio}} <br> La reserva termina {{$plaza->final}}
                        @endif
                         @endforeach</h5>
                    <form action="{{ route('empresa.cancelarReserva',$reserva ->id) }}" method="GET">
                        <button type="submit" class="btn btn-outline-dark">Cancelar la reserva</button>
                    </form>
                    <form action="{{ route('empresa.verificarReserva',$reserva ->id) }}" method="GET">
                        <button type="submit" class="btn btn-outline-dark">Verificar la reserva</button>
                    </form>
                    <form action="{{ route('empresa.verificarReserva',$reserva ->id) }}" method="GET">
                        <button type="submit" class="btn btn-outline-dark">Verificar la reserva</button>
                    </form>
                </div>
            </div>
            <br>
        @endforeach
    </div>
    <a href="/misreservascanceladas" class="btn btn-info" role="button">Ver mis reservas canceladas</a>
    <a href="/misreservasverificadas" class="btn btn-info" role="button">Ver mis reservas verificadas</a>
@endsection
