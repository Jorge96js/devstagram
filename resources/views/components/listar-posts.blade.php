
<div>
    @if ($posts->count())

    <div class="flex flex-col gap-5 px-10 py-3 items-center">
        @foreach ($posts as $post )

        <div class="flex flex-col w-6/12 p-3 border-b border-gray-600">

            <img class="w-full" src="{{ asset('uploads') . '/' . $post->imagen }}" alt="{{ $post->titulo }}">

            <div class="p-3 flex items-center gap-5">
               @auth
                
                @if ($post->checkLike(auth()->user()))
                <form method="POST" action="{{ route('posts.likes.destroy', $post) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                          </svg>
                          
                    </button>
                </form>

                @else

                <form method="POST" action="{{ route('posts.likes.store', $post) }}">
                    @csrf
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                          </svg>
                    </button>
                </form>   
             @endif

               @endauth
                <p>Likes: <b>{{ $post->like->count() }}</b></p>
                
            </div>
            <div>
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500"> {{ $post->created_at->diffForHumans() }} </p>
                <p class="mt-5"> {{ $post->descripcion }} </p>
            </div>

        </div>
        @endforeach
    </div>

    @else
        <h2 class="text-center text-white text-4xl">Aun no hay ningun post</h2>
    @endif
</div>
