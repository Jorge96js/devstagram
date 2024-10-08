<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('styles')
        <link rel="stylesheet" href=" {{asset('css/app.css')}} ">
        <title>Devstagram - @yield('titulo')</title>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        <!--<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />-->

        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        
        
        @livewireStyles
    </head>
    <body class="bg-zinc-900 text-white">

        <header class="p-5 border-b border-b-zinc-500">

            <div class="container mx-auto flex justify-between items-center">

                <a href="{{ route('home') }}" class="text-3xl  text-green-500 font-black">DevStagran</a>

                @auth
                <nav class="flex gap-2 items-center">

                    <a href="{{ route('posts.create') }}" class="rounded-md border-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                          </svg>                          
                    </a>

                    <a class="font-bold mx-10 text-gray-400 text-sm" href="{{ route('posts.index', ['user' => auth()->user()->username]) }}">
                        Hola: <span class="font-normal"> {{ auth()->user()->username }} </span>
                    </a>

                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="font-bold uppercase text-gray-400 text-sm">Logout</button>
                    </form>
                </nav>
                @endauth

                @guest
                <nav class="flex gap-2 items-center">
                    <a class="font-bold uppercase text-gray-400 text-sm" href="{{ route('login') }}">Login</a>
                    <a class="font-bold uppercase text-gray-400 text-sm" href="{{ route('register') }}">Register</a>
                </nav>
                @endguest

            </div>

        </header>
        
        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('titulo')
            </h2>
            @yield('contenido')
        </main>

        <footer class="text-center font-bold p-5 mt-10 text-gray-300 uppecase">
            DevStagram - Todos los derechos reservados @php echo date('Y')
            @endphp
        </footer>

        @livewireScripts
    </body>    
</html>