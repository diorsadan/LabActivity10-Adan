@extends('layouts.app')

@section('content')
    <div class="bg-white rounded shadow p-6">
        <div class="flex flex-wrap gap-2 mb-2">
            @if ($post->is_pinned)
                <span class="text-xs bg-yellow-300 text-yellow-900 rounded px-2 py-1">Pinned</span>
            @endif
            <span class="text-xs bg-blue-100 text-blue-800 rounded px-2 py-1">{{ $post->category }}</span>
        </div>

        <h1 class="text-2xl font-bold">{{ $post->title }}</h1>

        <p class="text-sm text-gray-500 mt-1">
            {{ $post->published_at->format('M d, Y') }} · {{ $post->views }} views
        </p>

        <p class="mt-4 whitespace-pre-line">{{ $post->body }}</p>

        <a href="{{ route('posts.index') }}" class="inline-block mt-6 text-blue-700 hover:underline">← Back to posts</a>
    </div>
@endsection
