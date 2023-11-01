@extends('layouts.app')

@section('title', 'All posts')

@section('content')
    {{-- @foreach ($posts as $key => $post)
        @break($key == 1)
        <div> {{ $key }} . {{ $post['title'] }}</div>
    @endforeach --}}

    {{-- @each('posts.partials.post', $posts, 'post') --}}

    @forelse ($posts as $key => $post)
        @include('posts.partials.post', ['bau' => 3])
    @empty
        No posts found!
    @endforelse

    {{-- @foreach ($posts as $post)
        <div>{{ $post['title'] }}</div>
    @endforeach --}}

@endsection
