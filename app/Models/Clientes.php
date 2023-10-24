<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clientes extends Model
{
    use HasFactory;
    use SoftDeltes;

    protected $guarded = [ "id" ];
    protected $table = 'clientes';

    protected $fillable = [
        'name',
        'apellido',
        'dni',
        'telefono'
    ];

}
