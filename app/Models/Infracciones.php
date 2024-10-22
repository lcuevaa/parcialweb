<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infracciones extends Model
{
    use HasFactory;

    protected $table = "infracciones";
    protected $fillable = [
        'dni',
        'fecha',
        'placa',
        'infraccion'
    ];
}
