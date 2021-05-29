<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plaza extends Model
{
    use HasFactory;
    public $timestamps=false;

    protected $fillable = [
        'capacidad',
        'empresa_idempresa',
        'inicio',
        'final',
        'expirada'
    ];
}

