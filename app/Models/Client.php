<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients'; // 👈 LO QUE FALTABA

    use HasFactory;
    protected $guarded=["id"];
}
