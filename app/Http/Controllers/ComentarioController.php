<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComentarioController extends Controller
{
    public function store(Request $request, User $user, Post $post){

        //Validar
        $validate = $request->validate([
            'comentario' => 'required|max:255',
        ]);

        //Almacenar resultado
        Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comentario' => $request->comentario
        ]);
        //Imprimir mensaje
        return back()->with('mensaje', 'Su comentario se ha enviado');
    }
}
