@extends('layouts.app')

@section('content')
    {{-- search form, stacked on phone and one row on bigger screens --}}
    <form method="GET" action="{{ route('posts.index') }}" class="flex flex-col sm:flex-row gap-2 mb-6">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Search title..."
            class="flex-1 border border-gray-300 rounded px-3 py-2 bg-white">

        <select name="category" class="border border-gray-300 rounded px-3 py-2 bg-white">
            <option value="">All</option>
            @foreach ($categories as $category)
                {{-- @selected keeps the chosen category after filtering --}}
                <option value="{{ $category }}" @selected(request('category') == $category)>{{ $category }}</option>
            @endforeach
        </select>

        <button type="submit" class="bg-blue-700 text-white rounded px-4 py-2">Filter</button>
    </form>

    {{-- 1 column on phone, 2 columns on md and up --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @forelse ($posts as $post)
            <div class="bg-white rounded shadow p-4">
                <div class="flex flex-wrap gap-2 mb-2">
                    @if ($post->is_pinned)
                        <span class="text-xs bg-yellow-300 text-yellow-900 rounded px-2 py-1">Pinned</span>
                    @endif
                    <span class="text-xs bg-blue-100 text-blue-800 rounded px-2 py-1">{{ $post->category }}</span>
                </div>

                <a href="{{ route('posts.show', $post->id) }}" class="text-lg font-semibold hover:underline">
                    {{ $post->title }}
                </a>

                {{-- author id only, author name needs a relationship (week 11) --}}
                <p class="text-sm text-gray-500 mt-2">
                    {{ $post->published_at->format('M d, Y') }} · {{ $post->views }} views · Author ID: {{ $post->author_id }}
                </p>
            </div>
        @empty
            <p class="text-gray-500">No posts match your search.</p>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $posts->links() }}
    </div>

    <p class="text-sm text-gray-500 mt-2">
        Showing {{ $posts->firstItem() }}–{{ $posts->lastItem() }} of {{ $posts->total() }} posts
    </p>
@endsection
