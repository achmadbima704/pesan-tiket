<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Armada extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'brand',
        'poice_number',
        'capacity',
        'status'
    ];
}
