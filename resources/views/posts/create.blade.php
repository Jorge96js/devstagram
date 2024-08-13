@extends('layouts.app')

@section('titulo')
    Create a post
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
         <div class="md:w-1/2 px-10">
            <form action="{{ route('imagenes.store') }}" method="post" enctype="multipart/form-data" class="dropzone border-dashed border-2 w-full h-96 rounded-md flex flex-col justify-center items-center" id="dropzone">  @csrf</form>
        </div> 

        <div class="md:w-1/2  bg-zinc-800 rounded-md p-10 mt-10 md:mt-0">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label class="mb-2 uppercase font-bold text-gray-100" for="titulo">Post title</label>
                    <input id="titulo" type="text-area" class="mb-2 uppercase font-bold rounded outline-none p-2 text-black w-full bg-gray-300 @error('name') border-2 border-red-500 @enderror" value="{{ old('titulo') }}" name="titulo" placeholder="Your title">
                    @error('titulo')
                        <p class="bg-red-500 text-white font-bold text-center uppercase rounded-md p-2 my-2">{{ $message }}</p>
                    @enderror
                    <label class="mb-2 uppercase font-bold text-gray-100" for="descripcion">Post description</label>
                    <textarea id="descripcion" class="mb-2 uppercase font-bold rounded outline-none p-2 text-black w-full bg-gray-300 @error('name') border-2 border-red-500 @enderror" name="descripcion" placeholder="Your description">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <p class="bg-red-500 text-white font-bold text-center uppercase rounded-md p-2 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="hidden" name="imagen" value="{{ old('imagen') }}">
                    @error('imagen')
                    <p class="bg-red-500 text-white font-bold text-center uppercase rounded-md p-2 my-2">{{ $message }}</p>
                @enderror
                </div>
        
                <input type="submit" value="REGISTER NOW" class="bg-green-600 font-bold text-white p-3 uppercase hover:bg-green-500 transition-colors rounded-md w-full">
            </form>
        </div>
    </div>
@endsection