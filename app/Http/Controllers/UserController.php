<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Empresa;
use App\Models\Plaza;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {

    }
    public function buscador()
    {
        $datos['usuarios']=Empresa::paginate(100);
        return view('buscador', $datos);
    }

    public function perfilC(User $cliente)

    {
        return view("editar",['cliente'=>$cliente]);
    }

public function show()
{

}

    public function update(Request $request, User $cliente)
    {
        $cliente->fill($request->input())->saveOrFail();
        return view("editar",['cliente'=>$cliente]);
        //
    }
    public function destroy($clienteid)
    {
        //
        $peli=User::where('id', '=', "$clienteid")->first();

// Lo eliminamos de la base de datos
        $peli->delete();
        return view("welcome");

    }

}
