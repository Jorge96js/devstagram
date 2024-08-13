@extends('layouts.app')

@section('titulo')
{{ $post->titulo }}
@endsection

@section('contenido')

<div class="container mx-auto md:flex">


    <div class="md:w-1/2">
        <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="{{ $post->titulo }}">
        <div class="p-3">
            <p>Likes: 0</p>
        </div>
        <div>
            <p class="font-bold">{{ $post->user->username }}</p>
            <p class="text-sm text-gray-500"> {{ $post->created_at->diffForHumans() }} </p>
            <p class="mt-5"> {{ $post->descripcion }} </p>
        </div>

    @auth
        @if ($post->user_id === auth()->user()->id)            
        <form method="POST" action="{{ route('posts.destroy', $post) }}">
            @method("DELETE")
            @csrf
            <input value="Borrar" type="submit" class="text-white bg-red-500 hover:bg-red-400 text-center font-bold rounded-md px-10 py-3 my-10">
        </form>
        @endif
    @endauth
    </div>

    <div class="md:w-1/2 p-5">
        <div class="rounded-md shadow bg-gray-800 p-5 mb-5">
            
            @auth

            <p class="mb-4 font-bold text-4xl">Agrega un nuevo comentario</p>
            @if (session('mensaje'))
                <div class="bg-green-700 p-5 text-white rounded-md">
                    {{session('mensaje')}}
                </div>
            @endif
            <form action="{{ route('comentarios.store', ['post' => $post, 'user' => $user]) }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label class="mb-2 uppercase font-bold text-gray-100" for="comentario">Comentario: </label>
                    <textarea 
                    id="comentario"
                     class="mb-2 uppercase font-bold rounded outline-none p-2 text-black w-full bg-gray-300 @error('name') border-2 border-red-500 @enderror"
                      name="comentario" placeholder="Comentraio"> </textarea>
                    @error('comentario')
                        <p class="bg-red-500 text-white font-bold text-center uppercase rounded-md p-2 my-2">{{ $message }}</p>
                    @enderror
                </div>
    
                
                <input type="submit" value="comentar" class="bg-green-600 font-bold text-white p-3 uppercase hover:bg-green-500 transition-colors rounded-md w-full">
            </form>
                
            @endauth
        
            
            <div class=" shadow my-5 max-h-96 overflow-y-scroll">
                    @if ($post->comentarios->count())
                    @foreach ($post->comentarios as $comentario )
                        <div class="p-5 border-b">
                            <a href="{{ route('posts.index', $comentario->user) }}" class="font-black">{{ $comentario->user->username }}</a>
                            <p>{{ $comentario->comentario }}</p>
                            <p class="text-gray-600 hover:text-gray-400 font-light text-xs">{{ $comentario->created_at->diffForHumans() }}</p>

                        </div>
                    @endforeach
                    @else

                    <p class="p-10 text-bold text-center">Aun no hau comentarios</p>

                    @endif
            </div>
        </div>
        
    </div>
</div>

    
@endsection