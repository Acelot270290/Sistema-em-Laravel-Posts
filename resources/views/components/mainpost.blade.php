@props(['post' => $post])

<div class="mb-4">

    <a href="{{ route('criarpostagem.show', $post) }}" class="font-bold">{{ $post->titulo }}</a>
    <br>
    <a href="{{ route('contas.postagens', $post->conta) }}" class="font-bold">{{ $post->conta->name }}</a> <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>

    @if(Auth::user() && Auth::user()->id == $post->conta_id)
        <form action="{{ route('criarpostagem.destroy', $post) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Delete</button>
        </form>
    @endif
</div>