<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agregar extends Model
{
    protected $table = 'agregar'; // 👈 LO QUE FALTABA

    use HasFactory;
    protected $guarded=["id"];
}
