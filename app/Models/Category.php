<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories'; // 👈 LO QUE FALTABA

    use HasFactory;
    protected $guarded=["id"];
}
