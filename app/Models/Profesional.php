<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Profesional extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'profesionales'; // Aquí define el nombre correcto de la tabla en español
    public $timestamps = true;


    protected $fillable = [
        'name',
        'apellido',
        'dni',
        'telefono'
    ];
}
