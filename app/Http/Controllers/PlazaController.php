<?php

namespace App\Http\Controllers;

use App\Models\Plaza;
use App\Models\Reserva;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Array_;

class PlazaController extends Controller
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
    public function create()
    {
        //
        return view("empresa.crearPlaza");

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
        $plaza = new Plaza($request->input());
        $plaza->save();
        $plaza = Plaza::all();
        return redirect('/empresa/home');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Plaza $plaza
     * @return \Illuminate\Http\Response
     */
    public function show(Plaza $plaza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Plaza $plaza
     * @return \Illuminate\Http\Response
     */
    public function edit(Plaza $plaza)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Plaza $plaza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plaza $plaza)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Plaza $plaza
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plaza $plaza)
    {
        //
    }

    public function mostrarPlazasClientes($id)
    {
        $reservas = Reserva::all();
        $fechaActual=date('Y-m-d H:i:s');
        $plazast = Plaza::all()->where('empresa_idempresa','=',$id,'&','expirada','=','0');
        $plazas = [];
        $reservaGuardada =0;
        $contador=0;
        $controladorB=true;
        if (empty($reservas)){
              $plazas = $plazast;
           }
           foreach( $plazast as $plaza){
               $controladorB=true;
               foreach( $reservas as $reserva){
                   if($plaza['idplaza']==$reserva['plaza_idplaza']){
                       $controladorB=false;
                       $reservaGuardada = $reserva;
                   }
              }
               if (!$controladorB){
                   if ($reservaGuardada['estado_idestado']==2){
                       $plazas[$contador]=$plaza;
                       $contador++;
                   }
               } else {
                   $plazas[$contador]=$plaza;
                   $contador++;
               }
         }

        return view('plaza', ['plazas'=>$plazas]);
         }
    }


