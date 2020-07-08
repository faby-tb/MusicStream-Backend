<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtistaRequest;
use Illuminate\Support\Str;

use App\Imagen;
use App\Artista;
use App\Cancion;
use App\Http\Requests\EditarArtistaRequest;

class ArtistasController extends Controller
{
    /**
     * Muestra los artistas
     * 
     * @return response
     */
    public function index(){

        $artistas = Artista::with('photos')->get();
        
        return view('artistas.index',[
            'artistas' => $artistas,    
        ]);
    }

    /**
     * Muestra el form para añadir artistas
     * 
     * @return response
     */
    public function create(){
        return view('artistas.create');
    }

    /**
     * Mostrar un solo artista
     * 
     * @param Artista $artista
     * @return response
     */
    public function show(Artista $artista){

        $canciones = Artista::with('songs')->where('id', $artista['id'])->get();
        return view('artistas.show',[
            'artista' => $artista,
            'canciones' => $canciones
        ]);
    }

    /**
         * Este metodo se encarga de almacenar la informacion quie venga del form
         * 
         * Recorre la lista de archivos, verifica que sean en el formato deseado,
         * cambia sus nombres por uno nuevo e incluye una dirección en el servidor
         * Luego los datos son almacenados en dicho servidor y por ultimo creados en la base de datos
         * 
         * 
         * @var App\Http\Requests\ArtistaRequest
         * */ 
    public function store(ArtistaRequest $request){
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
        if($artista){
            return redirect(route('artistas.index'));
        }
    }

    /**
     * Muestra el form de editar
     * 
     * @return response
     */
    public function edit(Artista $artista){
        return view('artistas.edit',[
            'artista' => $artista
        ]);
    }

    /**
     *  Se encarga de modificar el artista en la base de datos
     * 
     * @var App\Http\Requests\ArtistaRequest;
     * @return void
     */
    public function update(EditarArtistaRequest $request){
        $data = $request->validated();
        $artista = Artista::where('id', $data['id'])->update($data);
        if($artista){
            return redirect(route('artistas.index'));
        }
    }

    /**
     * Se encarga de eliminar el artista de la base de datos
     * 
     * @param Artista $artista
     * @return void
     */
    public function delete(Artista $artista){
        Cancion::where('songable_id', $artista['id'])->delete();
        Imagen::where('imageable_id', $artista['id'])->delete();
        $artistaEliminado = Artista::where('id', $artista['id'])->delete();
        if($artistaEliminado){
            return redirect(route('artistas.index'));
        }
    }



    public function hola(){
        $saludo='Hola Guapisimos';

        return json_encode(array(
            'status'=>200,
            'reponse'=> array(
                'nombre'=> $saludo
            )
        ));
    }

    public function topThree(){
        $artistas = Artista::with('photos')
            ->orderBy('created_at','desc')
            ->take(3)
            ->get();

        return json_encode(array(
            'status'=>200,
            'reponse'=>array(
                'artistas'=>$artistas
            )
        ));
    }
}
