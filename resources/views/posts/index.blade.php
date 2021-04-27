@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            @auth
                <form action="{{ route('criarpostagem') }}" method="post" class="mb-4">
                    @csrf
                    <div class="mb-4">
                        <label for="titulo" class="sr-only">Título</label>
                        <input name="titulo" id="titulo" cols="30" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('titulo') border-red-500 @enderror" placeholder="Dê um título para a sua postagem."></textarea>

                        @error('titulo')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror

                        <br>
                        <br>
                        <label for="postagem" class="sr-only">Postagem</label>
                        <textarea name="postagem" id="postagem" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('postagem') border-red-500 @enderror" placeholder="Sobre o que você está pensando?"></textarea>

                        @error('postagem')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Postar</button>
                    </div>
                </form>
            @endauth

            @if ($posts->count())
                @foreach ($posts as $post)
                    <x-post :post="$post" />
                @endforeach

                {{ $posts->links() }}
            @else
                <p>Nenhuma postagem! Crie algo bacana! ;)</p>
            @endif
        </div>
    </div>
@endsection