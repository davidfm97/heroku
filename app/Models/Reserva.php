<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $fillable = [
        'num_personas',
        'estado_idestado',
        'user_iduser',
        'plaza_idplaza',
    ];
}
