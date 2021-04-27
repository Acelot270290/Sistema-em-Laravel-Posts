@props(['post' => $post])

<div class="mb-4">

    <span style="text-weight: bold;">{{ $post->titulo }}</span>
    <br>
    <a href="{{ route('contas.postagens', $post->conta) }}" class="font-bold">{{ $post->conta->name }}</a> <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>

    <p class="mb-2">{{ $post->postagem }}</p>

    @if(Auth::user() && Auth::user()->id == $post->conta_id)
        <form action="{{ route('criarpostagem.destroy', $post) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Delete</button>
        </form>
    @endif
</div>