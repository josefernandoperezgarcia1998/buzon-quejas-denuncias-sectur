<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buzon extends Model
{
    use HasFactory;

    protected $fillable = [
        'folio',
        'nombre',
        'telefono',
        'email',
        'cargo_puesto',
        'fecha',
        'nombre_servidor_denuncia',
        'cargo_puesto_servidor_denuncia',
        'fecha_servidor_denuncia',
        'mensaje_breve_servidor_denuncia',
        'nombre_testigo',
        'domicilio_testigo',
        'telefono_testigo',
        'email_testigo',
        'trabajo_admon_publica',
        'entidad_dependencia_testigo',
        'cargo_testigo',
        'estado',
        'area_id',
        'area_denunciado_id',
    ];

    
    /* Relación inversa uno a muchos | Un mensjae tiene una area */
    public function area()
    {
        return $this->belongsTo('App\Models\Area', 'area_id');
    }

    /* Relación inversa uno a muchos | Un mensjae tiene una area */
    public function area_denunciante()
    {
        return $this->belongsTo('App\Models\Area','area_denunciado_id');
    }

}
