<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piloto extends Model
{
    use HasFactory;
    protected $fillable=['nombre', 'url'];

    public function naves(){
        return $this->belongsToMany('App\Models\Nave')
         ->withTimestamps();
    }


    public function navesOut(){

        $misNaves = $this->naves()->pluck('naves.id');

        $navesSin = Nave::whereNotIn('id', $misNaves)->orderBy('nombre');

        return $navesSin;

    }


}
