<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Specialty;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        'bi',
        'name',
        'enable',
        'sex',
        'telf',
        'photo',
        'id_specialty',
        'morada',
        'municipio',
        'provincia',
        'email',
        'born_at'
    ];

    public function specialty(){
        $this->belongsTo(Specialty::class);
    }

}
