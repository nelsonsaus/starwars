<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nave extends Model
{
    use HasFactory;
    protected $fillable=['nombre', 'logo', 'pilotos', 'precio'];
    protected $casts = [
        'pilotos' => 'array'
    ];


    public function pilotos(){

        return $this->belongsToMany('App\Models\Piloto')->withTimestamps();

    }

    //-----------------------------------------------------------------------------------------
    //NOS MUESTRA LOS PILOTOS QUE NO ESTAN EN ESA NAVE, PARA QUE PODAMOS METERLOS CON UN SELECCIONABLE DESPUES
    public function pilotosOut(){


        $misPilotos=$this->pilotos()->pluck('pilotos.id');

        $pilotosOut=Piloto::whereNotIn('id', $misPilotos)->get();
        return $pilotosOut;


    }
}
