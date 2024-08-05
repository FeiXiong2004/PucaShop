@extends('layouts.layout')

@section('title')
    Blog
@endsection

@section('libs-css')
    <link rel="stylesheet" href="{{ asset('clients/asset/css/blog.css') }}">
    <!-- Add Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
@endsection

@section('content')
<div class="blog-container">
    <header class="blog-header">
        <h1>Our Blog</h1>
        <p>Welcome to our blog! Find the latest news and articles below.</p>
    </header>

    <div class="posts">
        @foreach($posts as $post)
        <article class="post">
            <img src="{{ $post->image }}" alt="{{ $post->title }}" class="post-image">
            <div class="post-content">
                <h2 class="post-title">{{ $post->title }}</h2>
                <p class="post-description">{{ $post->description }}</p>
                <a href="{{ route('blogDetail', $post->id) }}" class="read-more-btn">Read More</a>
            </div>
        </article>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="pagination">
        {{ $posts->links() }}
    </div>
</div>
@endsection
