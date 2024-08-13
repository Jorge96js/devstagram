@extends('layouts.app')

@section('titulo')
    Registrate en DevStagram
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:ga md:items-center">
    <div class="md:w-4/12 p-5">
        <img src="{{asset('img/image.png')}}" alt="">
    </div>

    <div class="md:w-4/12 bg-zinc-800 rounded-md p-5">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-5">
                <label class="mb-2 uppercase font-bold text-gray-100" for="name">Name</label>
                <input id="name" type="text" class="mb-2 uppercase font-bold rounded outline-none p-2 text-black w-full bg-gray-300 @error('name') border-2 border-red-500 @enderror" value="{{ old('name') }}" name="name" placeholder="Your name">
                @error('name')
                    <p class="bg-red-500 text-white font-bold text-center uppercase rounded-md p-2 my-2">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-5">
                <label class="mb-2 uppercase font-bold text-gray-100" for="username">Username</label>
                <input id="username" type="text" class="mb-2 uppercase font-bold rounded outline-none p-2 text-black w-full bg-gray-300 @error('username') border-2 border-red-500 @enderror" value="{{ old('username') }}" name="username" placeholder="Your username">
                @error('username')
                    <p class="bg-red-500 text-white font-bold text-center uppercase rounded-md p-2 my-2">{{ $message }}</p>
                @enderror
            </div>
    
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
                <label class="mb-2 uppercase font-bold text-gray-100" for="password_confirmation">Repeat your Password</label>
                <input id="password_confirmation" type="password" class="mb-2 uppercase font-bold rounded outline-none p-2 text-black w-full bg-gray-300" name="password_confirmation" placeholder="Repeat your password">
            </div>
    
            <input type="submit" value="REGISTER NOW" class="bg-green-600 font-bold text-white p-3 uppercase hover:bg-green-500 transition-colors rounded-md w-full">
        </form>
    </div>

</div>
@endsection