@extends('layouts.layout')

@section('title', $post->title)

@section('libs-css')
    <link rel="stylesheet" href="{{ asset('clients/asset/css/blogDetail.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
@endsection

@section('content')
<div class="blog-detail-container">
    <article class="blog-post">
        <h1 class="blog-post-title">{{ $post->title }}</h1>
        <img src="{{   $post->image }}" alt="{{ $post->title }}" class="blog-post-image">

        <div class="blog-post-meta">
            <p><strong>Category:</strong> {{ $post->category->name }}</p>
            {{-- <p><strong>Published:</strong> {{ $post->created_at->format('F d, Y') }}</p> --}}
            <p><strong>Views:</strong> {{ $post->view }}</p>
        </div>

        <div class="blog-post-description">{{ $post->description }}</div>

        <div class="blog-post-content">
            {!! nl2br(e($post->content)) !!}
        </div>

        <div class="blog-post-footer">
            <a href="{{ route('blog') }}" class="back-to-blog-btn">Back to Blog</a>
        </div>
    </article>
</div>
@endsection
