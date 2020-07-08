<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImagenRequest;
use Illuminate\Support\Str;


use App\Imagen;
use App\Artista;
use Illuminate\Http\Request;

class ImagenesController extends Controller
{

    public function __construct(){
        $this->middleware('auth', [
            'except' => [
                'index',
                'show'
            ],
        ]);
        $this->middleware('role:artistas.index,admin,moderador', [
            'except' => [
                'index',
                'show'
            ],
        ]);
    }

     /**
     * Muestra el form para añadir imagenes
     * 
     * @return response
     */
    public function create(Artista $artista){
        
        return view('imagenes.create',[
            'artista'=> $artista
        ]);
    }

    /**
         * Este metodo se encarga de almacenar la informacion que venga del form
         * 
         * 
         * @var App\Http\Requests\ImagenRequest
         * */ 
        public function store(ImagenRequest $request){
            $data = $request->validated();
            $artista = Artista::where('id', $request['id'])->get()[0];
             
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
            if($artista){
                return redirect(route('artistas.show',$artista->id));
            }
        }
}
