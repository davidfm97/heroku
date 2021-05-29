<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Plaza;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $todos = Reserva::all();
        $reserva = new Reserva($request->input());
        $contador = 0;
        if (empty($todos)) {
            $reserva->save();
        } else {
            foreach ($todos as $reservasprevias) {
                if (($reserva['plaza_idplaza'] = $reservasprevias['plaza_idplaza']) && ($reservasprevias['estado_idestado'] != 2)) {
                    $contador++;
                }
            }
            if ($contador = 0) {
                $reserva->save();
            }

        }


    }

    public function crearReserva(Request $request, $id)
    {
        //
        $todos = Reserva::all();
        $datos = ['num_personas' => $request['num_personas'], 'user_iduser' => Auth::user()->id, 'plaza_idplaza' => $id];
        $reserva = Reserva::create($datos);
        $contador = 0;

        $cliente = User::find(Auth::user()->id);
        $puntos= $cliente->puntoxZgZ;

        if (empty($todos)) {
            if ($puntos>=100){
                $reserva->save();
                $puntos= $puntos-100;
                $cliente->puntoxZgZ = $puntos;
                $cliente->save();
            }

        } else {
            foreach ($todos as $reservasprevias) {
                if (($id = $reservasprevias['plaza_idplaza']) && ($reservasprevias['estado_idestado'] != 2)) {
                    $contador++;
                }
            }
            if ($contador = 0) {
                if($puntos>=100){
                    $reserva->save();
                    $puntos= $puntos-100;
                    $cliente->puntoxZgZ = $puntos;
                    $cliente->save();
                }
            }

        }

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Reserva $reserva
     * @return \Illuminate\Http\Response
     */
    public function show(Reserva $reserva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Reserva $reserva
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserva $reserva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Reserva $reserva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserva $reserva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Reserva $reserva
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserva $reserva)
    {
        //
    }

    public function reservasCliente()
    {
        $reservas = Reserva::all()->where('user_iduser', '=', Auth::user()->id);
        $reservas = $reservas->where('estado_idestado','=','1');
        $plazas = Plaza::all();
        $plazasF = [];
        $empresas = Empresa::all();
        $empresasF = [];

        foreach ($plazas as $plaza) {
            foreach ($reservas as $reserva) {
                if ($plaza['idplaza'] == $reserva['plaza_idplaza']) {
                    $plazasF[$reserva->id]=$plaza;
                }
            }

        }

        foreach ($empresas as $empresa) {
            foreach ($plazasF as $plaza) {
                if ($empresa['id'] == $plaza['empresa_idempresa']) {
                    $empresasF[$plaza->idplaza]=$empresa;
                }
            }
        }


        return view("misreservas", ['reservas' => $reservas, 'plazas' => $plazasF, 'empresas'=> $empresasF]);
    }

    public function reservasEmpresa()
    {
        $id= Auth::guard('empresa')->user()->id;
        $plazas=Plaza::all()->where('empresa_idempresa','=',$id);
        $reservas = Reserva::all();
        $reservasF = [];
        $clientes = User::all();
        $clientesF = [];

            foreach ($reservas as $reserva) {
                foreach ($plazas as $plaza) {

                if ($plaza['idplaza'] == $reserva['plaza_idplaza']) {
                    $reservasF[$plaza->idplaza]=$reserva;
                }
            }
        }
        foreach ($clientes as $cliente) {
            foreach ($reservasF as $reserva) {
                if ($cliente['id'] == $reserva['user_iduser']) {
                    $clientesF[$reserva->id]=$cliente;
                }
            }
        }
        return view("empresa.misreservas", ['reservas' => $reservasF, 'plazas' => $plazas, 'clientes'=> $clientesF]);
    }
    public function reservasClienteCanceladas()
    {
        $reservas = Reserva::all()->where('user_iduser', '=', Auth::user()->id);
        $reservas = $reservas->where('estado_idestado','=','2');
        $plazas = Plaza::all();
        $plazasF = [];
        $empresas = Empresa::all();
        $empresasF = [];

        foreach ($plazas as $plaza) {
            foreach ($reservas as $reserva) {
                if ($plaza['idplaza'] == $reserva['plaza_idplaza']) {
                    $plazasF[$reserva->id]=$plaza;
                }
            }

        }

        foreach ($empresas as $empresa) {
            foreach ($plazasF as $plaza) {
                if ($empresa['id'] == $plaza['empresa_idempresa']) {
                    $empresasF[$plaza->idplaza]=$empresa;
                }
            }
        }


        return view("misreservascanceladas", ['reservas' => $reservas, 'plazas' => $plazasF, 'empresas'=> $empresasF]);
    }
    public function reservasClienteVerificadas()
    {
        $reservas = Reserva::all()->where('user_iduser', '=', Auth::user()->id);
        $reservas = $reservas->where('estado_idestado','=','3');
        $plazas = Plaza::all();
        $plazasF = [];
        $empresas = Empresa::all();
        $empresasF = [];

        foreach ($plazas as $plaza) {
            foreach ($reservas as $reserva) {
                if ($plaza['idplaza'] == $reserva['plaza_idplaza']) {
                    $plazasF[$reserva->id]=$plaza;
                }
            }

        }

        foreach ($empresas as $empresa) {
            foreach ($plazasF as $plaza) {
                if ($empresa['id'] == $plaza['empresa_idempresa']) {
                    $empresasF[$plaza->idplaza]=$empresa;
                }
            }
        }


        return view("misreservasverificadas", ['reservas' => $reservas, 'plazas' => $plazasF, 'empresas'=> $empresasF]);
    }
    public function cancelar($id){
        $reserva = Reserva::find($id);
        $reserva->estado_idestado = 2;
        $reserva->save();

        $cliente = User::find($reserva->user_iduser);
        $puntos= $cliente->puntoxZgZ;
        $puntos= $puntos-100;
        $cliente->puntoxZgZ = $puntos;
        $cliente->save();
        return view('home');
    }
    public function cancelarReservaEmpresa($id){
        $reserva = Reserva::find($id);
        $reserva->estado_idestado = 2;
        $reserva->save();

        $cliente = User::find($reserva->user_iduser);
        $puntos= $cliente->puntoxZgZ;
        $puntos= $puntos-100;
        $cliente->puntoxZgZ = $puntos;
        $cliente->save();
        return view('empresa.home');
    }
    public function verificar($id){
        $reserva = Reserva::find($id);
        $reserva->estado_idestado = 3;
        $reserva->save();

        $cliente = User::find($reserva->user_iduser);
        $puntos= $cliente->puntoxZgZ;
        $puntos= $puntos+150;
        $cliente->puntoxZgZ = $puntos;
        $cliente->save();
        return view('empresa.home');
    }
    public function verificarQR(){
        return view('empresa.verificarQR');
    }
    public function descargar($id)
    {
        $direccion ="verificar/$id";
        $data = [
            'codigoqr' => $direccion

        ];
        $pdf = \PDF::loadView('reservaQR', $data);

        return $pdf->download('archivo.pdf');
    }
}
