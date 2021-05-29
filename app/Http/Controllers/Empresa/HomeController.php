<?php

namespace App\Http\Controllers\Empresa;
use Auth;
use App\Models\Plaza;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PlazaController;

class HomeController extends Controller
{
    /**
     * Show Admin Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('empresa.home');
    }
    public function plazas()
    {
        $id= Auth::guard('empresa')->user()->id;
        $plazas['plazas']=Plaza::all()->where('empresa_idempresa','=',$id);
        if (empty($plazas)){
            return view('empresa.plazasemp');
        } else {
            return view('empresa.plazasemp', $plazas);
        }

    }
}
