@extends('layouts.app')

@section('title', $post['title'])

@section('content')
    @if ($post['is_new'])
        <div>A new blog post</div>
    @elseif(!$post['is_new'])
        <div>Old post</div>
    @endif

    @unless ($post['is_new'])
        <div> old post (using unless) </div>
    @endunless

    @isset($post['has_comments'])
        <div> This post has some comments </div>
    @endisset

    <h1> {{ $post['title'] }} </h1>
    <p> {{ $post['content'] }}

    @endsection
