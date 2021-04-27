@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="p-6">
                <h1 class="text-2xl font-medium mb-1">{{ $conta->name }}</h1>
                <p>Posted {{ $postagem->count() }} {{ Str::plural('postagem', $postagem->count()) }}</p>
            </div>

            <div class="bg-white p-6 rounded-lg">
                @if ($postagem->count())
                    @foreach ($postagem as $post)
                        <x-post :post="$post" />
                    @endforeach

                    {{ $postagem->links() }}
                @else
                    <p>{{ $conta->name }} does not have any posts</p>
                @endif
            </div>
        </div>
    </div>
@endsection