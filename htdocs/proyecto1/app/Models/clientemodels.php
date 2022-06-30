<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientemodels extends Model
{
    use HasFactory;
    protected $table='cliente';
    protected $fillable =[
        'nombre_cliente' => 'carlos',
        'apellido_cliente' => 'hormiga',
        'direccion_cliente' => 'popayan',
        'telefono_cliente' => '01800101010',

       ];
}