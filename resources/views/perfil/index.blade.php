@extends('layouts.app')

@section('titulo')
    Editar perfil: {{ auth()->user()->username }}
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:items-center">

    <div class="md:w-8/12 bg-zinc-800 rounded-md p-5">
        
        <form action="{{ route('perfil.index') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if (session('mensaje'))
            <p class="bg-red-500 text-white font-bold text-center uppercase rounded-md p-2 my-2">
                {{ session('mensaje') }}
            </p>
            @endif
    
            <div class="mb-5">
                <label class="mb-2 uppercase font-bold text-gray-100" for="username">Username</label>
                <input
                 id="username" 
                type="text"
                name="username" 
                class="mb-2 uppercase font-bold rounded outline-none p-2 text-black w-full bg-gray-300 @error('email') border-2 border-red-500 @enderror" value="{{ old('email') }}" name="email" placeholder="Your e-mail">
                @error('username')
                    <p class="bg-red-500 text-white font-bold text-center uppercase rounded-md p-2 my-2">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-5">
                <label class="mb-2 uppercase font-bold text-gray-100" for="imagen">Imagen Perfil</label>
                <input
                 id="imagen" 
                 type="file"
                 accept=".jpg, .png, .webp, .jpeg, .avif"
                class="mb-2 uppercase font-bold rounded outline-none p-2 text-black w-full bg-gray-300 @error('imagen') border-2 border-red-500 @enderror" name="imagen" placeholder="Your image">
               
                @error('imagen')
                    <p class="bg-red-500 text-white font-bold text-center uppercase rounded-md p-2 my-2">{{ $message }}</p>
                @enderror
            </div>


            <input type="submit" value="Save" class="bg-sky-600 font-bold text-white p-3 uppercase hover:bg-sky-500 transition-colors rounded-md w-full">
        </form>
    </div>

</div>
<div class="w-full text-center mt-5 mx-auto">
    <a href="{{ route('posts.index', auth()->user()->username) }}">Cancel</a>
</div>
@endsection