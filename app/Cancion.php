<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    protected $fillable = [
        'songable_id',
        'songable_type',
        'filename'
    ];
    public function songable(){
        return $this->morphTo();
    }
}
