<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion'
    ];
    public function photos(){
        return $this->morphMany('App\Imagen', 'imageable');
    }
    public function songs(){
        return $this->morphMany('App\Cancion', 'songable');
    }
}
