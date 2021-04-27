@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <h1>Postagens</h1>
    </div>
    <br>
    
    @if ($postagem->count())
        @foreach ($postagem as $post)
        <div class="flex justify-center">
            <div class="w-8/12 bg-white p-6 rounded-lg">
                <x-mainpost :post="$post" />
            </div>
        </div>
        @endforeach
        {{ $postagem->links() }}
    @else
        <div class="flex justify-center">
            <div class="w-8/12 bg-white p-6 rounded-lg">
                <p>Não há nenhuma postagem no blog, que tal logar ou se cadastrar e criar uma?</p>
            </div>
        </div>
    @endif
@endsection