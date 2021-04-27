@props(['coment' => $comentario])

<div class="mb-4">

    {{ $coment->conta_id }}</a> <span class="text-gray-600 text-sm">{{ Carbon\Carbon::parse($coment->created_at)->diffForHumans() }}</span>

    <p class="mb-2">{{ $coment->conteudo }}</p>

    @if(Auth::user() && Auth::user()->id == $coment->conta_id)
        <form action="{{ route('criarpostagem.destroy', $coment->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Delete</button>
        </form>
    @endif
</div>
