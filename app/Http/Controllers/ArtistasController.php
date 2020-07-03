<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtistaRequest;
use Illuminate\Support\Str;

use App\Imagen;
use App\Artista;

class ArtistasController extends Controller
{
    public function store(ArtistaRequest $request)
    {
        /**
         * Este metodo se encarga de almacenar la informacion quie venga del form
         * 
         * Recorre la lista de archivos, verifica que sean en el formato deseado,
         * cambia sus nombres por uno nuevo e incluye una dirección en el servidor
         * Luego los datos son almacenados en dicho servidor y por ultimo creados en la base de datos
         * 
         * 
         * 
         * */ 

        $data = $request->validated();
        $artista = Artista::create($data);

        if($request->hasFile('imagenes')){
            $allowedfileExtension=['jpeg','jpg','png','webp','jfif'];

            $files = $request->file('imagenes');

            foreach($files as $file){

                $filename = time() . Str::kebab($file->getClientOriginalName());

                $extension = $file->getClientOriginalExtension();

                $check=in_array($extension,$allowedfileExtension);

                $file->storeAs('public/images', $filename);

                $filename = 'storage/images/' . $filename;

                Imagen::create([
                    'imageable_id'=>$artista->id,
                    'imageable_type'=>'App\Artista',
                    'filename'=>$filename
                ]);
            }
        }
    }
}
