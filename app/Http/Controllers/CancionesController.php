<?php

namespace App\Http\Controllers;

use App\Http\Requests\CancionRequest;
use Illuminate\Support\Str;

use App\Cancion;

class CancionesController extends Controller
{
    public function store(CancionRequest $request, Artista $artistaId){

        $data = $request->validated();

        // $cancion['cancion'] = 'notfound.jpg';

        if($request->hasFile('cancion')){
            $file = $data['cancion'];

            $cancion = time() . Str::kebab( $file->getClientOriginalName());

            $file->storeAs('public/canciones', $cancion);

            $cancion = 'storage/canciones/' . $cancion;
        }

        $data['cancion'] = $cancion;

        $cancion = Cancion::create([
            'songable_id'=>$artistaId,
            'songable_type'=>'App\Artista',
            'filename'=>$filename
        ]);
    }
}
