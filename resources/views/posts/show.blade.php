@extends('layouts.app')

@section('titulo')
{{ $post->titulo }}
@endsection

@section('contenido')

<div class="container mx-auto md:flex">


    <div class="md:w-1/2">
        <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="{{ $post->titulo }}">
        <div class="p-3 flex items-center gap-5">
            @auth
            <livewire:like-post :post="$post" />

            @if ($post->checkLike(auth()->user()))
            {{-- <form method="POST" action="{{ route('posts.likes.destroy', $post) }}">
                @method('DELETE')
                @csrf

                
            </form>
            @else
            <form method="POST" action="{{ route('posts.likes.store', $post) }}">
                @csrf


                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                      </svg>
                      
                </button>
            </form>    --}}
         @endif
            
            
            @endauth

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