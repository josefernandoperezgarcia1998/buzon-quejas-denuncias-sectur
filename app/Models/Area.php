<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'estado',
    ];

    // Relación 1 a M
    public function buzon()
    {
        return $this->hasMany('App\Models\Buzon', 'area_id', 'id');
    }

    // Relación 1 a M
    public function buzon_denunciante()
    {
        return $this->hasMany('App\Models\Buzon', 'area_denunciado_id', 'id');
    }
}
