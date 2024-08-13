@extends('layouts.app')

@section('titulo')
    {{$user->username}} - Profile
@endsection

@section('contenido')

    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            
            <div class="w-6/12 md:w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/usuario.svg') }}" />
            </div>
            <div class="md:w-6/12 lg:w-6/12 px-5">
                <p class="text-gray-300 text-2xl mb-3">{{ $user->username }}</p>

                <div class="flex flex-col md:flex-row gap-3 md:justify-start items-start md:py-3 py-10">
                    <p class="text-gray-200 font-bold text-sm mb-3">
                        0
                        <span class="font-normal">Seguidores</span>
                    </p>
                    <p class="text-gray-200 font-bold text-sm mb-3">
                        0
                        <span class="font-normal">Siguiendo</span>
                    </p>
    
                    <p class="text-gray-200 font-bold text-sm mb-3">
                        0
                        <span class="font-normal">Posts</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="text-white text-4xl font-black text-center my-10">Publicaciones</h2>

        @if ($posts->count())
            
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
            <a href="{{ route('posts.show', ['post' => $post, 'user' => $user]) }}">
                <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
            </a>
            @endforeach
        </div>
        @else
        <div class="container mx-auto py-10 flex justify-center items-center g-5 flex-col">
            <div class="p-10 w-1/6 rounded-full  border-4 border-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                    <path strokeLinecap="round" strokeLinejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                  </svg>                  
            </div>
            <p class="text-gray-300 text-3xl my-5 font-bold text-center">Aun no hay ningun post</p>
        </div>
        @endif

        <div class="my-10">
            {{$posts->links()}}
        </div>

    </section>

@endsection