<?php

namespace App\Http\Controllers;

use App\Http\Requests\CancionRequest;
use Illuminate\Support\Str;

use App\Cancion;
use App\Artista;
use Illuminate\Http\Request;
use App\Http\Requests\EditarCancionRequest;

class CancionesController extends Controller
{

    public function __construct(){
        $this->middleware('auth', [
            'except' => [
                'index',
                'show',
                'songs'
            ],
        ]);
        $this->middleware('role:artistas.index,admin,moderador', [
            'except' => [
                'index',
                'show',
                'songs'
            ],
        ]);
    }

     /**
     * Muestra el form para añadir canciones
     * 
     * @return response
     */
    public function create(){
        $artistas = Artista::all();

        return view('canciones.create',[
            'artistas'=> $artistas
        ]);
    }

    public function store(CancionRequest $request){
        $artista = $request->artista;


        $artista = Artista::where('nombre', $artista)->get();
        $data = $request->validated();

        // $cancion['cancion'] = 'notfound.jpg';

        if($request->hasFile('cancion')){
            $allowedfileExtension=['mp3','ogg'];
            
            $file = $request->file('cancion');

            $cancion = time() . Str::kebab( $file->getClientOriginalName());

            $extension = $file->getClientOriginalExtension();
            $check=in_array($extension,$allowedfileExtension);

            $file->storeAs('public/canciones', $cancion);

            $cancion = 'storage/canciones/' . $cancion;
        }
        
        $cancion = Cancion::create([
            'songable_id'=>$artista[0]->id,
            'songable_type'=>'App\Artista',
            'name'=>$request->nombre,
            'filename'=>$cancion
        ]);
        if($cancion){
            return redirect(route('artistas.index'));
        }
    }

    /**
     * Muestra el form de editar
     * 
     * @return response
     */
    public function edit(Cancion $cancion){
        return view('canciones.edit',[
            'cancion' => $cancion
        ]);
    }

    /**
     *  Se encarga de modificar la cancion en la base de datos
     * 
     * @var App\Http\Requests\CancionRequest;
     * @return void
     */
    public function update(EditarCancionRequest $request){
        $data = $request->validated();
        $cancion = Cancion::where('id', $data['id'])->update($data);
        if($cancion){
            return redirect(route('artistas.index'));
        }
    }
    /**
     * Se encarga de eliminar la cancion de la base de datos
     * 
     * @param Cancion $cancion
     * @return void
     */
    public function delete(Cancion $cancion){
        $cancionEliminado = Cancion::where('id', $cancion['id'])->delete();
         
        if($cancionEliminado){
            return redirect(route('artistas.index'));
        }
    }

    public function songs(){


        // $canciones = Artista::with('songs'); Test Uno


        $canciones = Cancion::with('songable')->get(); /** Test dos*/

        return json_encode(array(
            'status'=>200,
            'reponse'=>array(
                'canciones'=>$canciones
            )
        ));
    }
}
