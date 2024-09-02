<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PerfilController extends Controller
{
    public function index(){

        return view('perfil.index',[
            
        ]);
    }

    public function store(Request $request){

        $request->request->add(['username' => Str::slug($request->username)]);

        $validate = $request->validate([
            'username' => ['required','unique:users','min:3','max:30', 'not_in:editar-perfil,login,register'],
        ]);

        if($request->imagen){
            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid() . "." . $imagen->extension();

            $manager = new ImageManager(new Driver()); // Instancia el manager
            $imagenServidor = $manager->read($imagen); // Lee la imagen
            $imagenServidor->resize(1000, 1000);       // Le hace el resize 
     
            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }
        //Guardar cambios
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->imagen  = $nombreImagen ?? '';
  
        $usuario->save();

        return redirect()->route('posts.index', $usuario->username);
    }
}
