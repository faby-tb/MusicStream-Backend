<?php

namespace App\Http\Controllers;
use App\Artista;
use App\Cancion;
use App\Imagen;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:libros.index,admin');
    }

    public function index(){

        $artistas = Artista::all();
        return view('admin.artistas',[
            'artistas' => $artistas
        ]);
    }
    public function canciones()
    {
        $canciones = Cancion::all();
        return view('admin.canciones',[
            'canciones'=>$canciones
        ]);
    }
    public function imagenes()
    {
        $imagenes = Imagen::all();
        return view('admin.imagenes',[
            'imagenes'=>$imagenes
        ]);
    }
}
