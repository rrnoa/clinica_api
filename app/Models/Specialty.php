<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;

class Specialty extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description'
    ];

    public function doctors(){
        $this->hasMany(Doctor::class);
    }
}
