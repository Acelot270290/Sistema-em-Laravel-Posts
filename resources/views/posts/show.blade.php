@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <x-post :post="$post" />
            @auth
                <form name="comment" action="{{ route('criarcomentario') }}" method="post" class="mb-4">
                    @csrf
                    <input type="hidden" name="postID" value="{{ $post->id }}">
                    <div class="mb-4">
                        <label for="conteudo" class="sr-only">Comentário</label>
                        <textarea name="conteudo" id="conteudo" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('conteudo') border-red-500 @enderror" placeholder="Comente sobre esta postagem?"></textarea>

                        @error('comentario')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Comentar</button>
                    </div>
                </form>
            @endauth
            @foreach ($comentarios as $comentario)
                <x-comentario :comentario="$comentario" />
            @endforeach
        </div>
    </div>
@endsection