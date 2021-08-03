<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'bi',
        'name',
        'enable',
        'sex',
        'telf',
        'photo',
        'morada',
        'municipio',
        'provincia',
        'email',
        'born_at'
    ];
}
