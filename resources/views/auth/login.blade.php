@extends('layouts.app')

@section('titulo')
    Inicia sesion en DevStagram
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:ga md:items-center">
    <div class="md:w-4/12 p-5">
        <img src="{{asset('img/login.jpg')}}" alt="">
    </div>

    <div class="md:w-4/12 bg-zinc-800 rounded-md p-5">
        <form action="{{ route('login') }}" method="POST">
            
            @csrf

            @if (session('mensaje'))
            <p class="bg-red-500 text-white font-bold text-center uppercase rounded-md p-2 my-2">
                {{ session('mensaje') }}
            </p>
            @endif
    
            <div class="mb-5">
                <label class="mb-2 uppercase font-bold text-gray-100" for="email">E-mail</label>
                <input id="email" type="email" class="mb-2 uppercase font-bold rounded outline-none p-2 text-black w-full bg-gray-300 @error('email') border-2 border-red-500 @enderror" value="{{ old('email') }}" name="email" placeholder="Your e-mail">
                @error('email')
                    <p class="bg-red-500 text-white font-bold text-center uppercase rounded-md p-2 my-2">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-5">
                <label class="mb-2 uppercase font-bold text-gray-100" for="password">Password</label>
                <input id="password" type="password" class="mb-2 uppercase font-bold rounded outline-none p-2 text-black w-full bg-gray-300 @error('password') border-2 border-red-500 @enderror" name="password" placeholder="Your password">
                @error('password')
                    <p class="bg-red-500 text-white font-bold text-center uppercase rounded-md p-2 my-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">

                <input type="checkbox" name="remember"> <label class="font-bold uppercase text-gray-300" for="remember">Recordar datos</label>
            </div>

            <input type="submit" value="Logi-In" class="bg-green-600 font-bold text-white p-3 uppercase hover:bg-green-500 transition-colors rounded-md w-full">
        </form>
    </div>

</div>
@endsection