<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    protected $table = 'noticias'; // 👈 LO QUE FALTABA

    use HasFactory;
    protected $guarded=["id"];
}
