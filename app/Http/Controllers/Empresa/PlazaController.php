<?php

namespace App\Http\Controllers;

use App\Models\Plaza;
use Illuminate\Http\Request;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $plaza = new Plaza($request->input());
        $plaza->save();
        $plaza = Plaza::all();
        return redirect('/empresa/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plaza  $plaza
     * @return \Illuminate\Http\Response
     */
    public function show(Plaza $plaza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plaza  $plaza
     * @return \Illuminate\Http\Response
     */
    public function edit(Plaza $plaza)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plaza  $plaza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plaza $plaza)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plaza  $plaza
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plaza $plaza)
    {
        //
    }
}
