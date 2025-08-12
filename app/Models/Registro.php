<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    protected $fillable = [
        'sensor_id',
        'valor',
        'unidade',
        'data_hora'
    ];

    //garantir que a conversao do banco seja do tipo datetime
    protected $casts = [
        'data_hora' => 'datetime'
    ];

    public function sensor(){
        return $this->belongsTo(Sensor::class);
    }

    
}
