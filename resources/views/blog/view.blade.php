@extends('layouts.frontend')

@section('title') {{$post->title}} @endsection

@section('content')
<div class="container">
        <article>
            <h2>
                <a href="{{ route('blog.view' , ['slug' => $post->slug]) }}">{{$post->title}}</a>
            </h2>
            <p>published by: {{$post->user->name}} on {{$post->published_at}}</p>
            <p class="text-muted">{{ $post->category ? $post->category->name : 'Uncategorized' }}</p>
            <p>{!! $post->body !!}</p>
            
           @if($post->image != null)
            <img height="100" width=100 src="{{ asset('uploads/posts/' . $post->image) }}">
           @else
            <img height="100" width=100 src="{{ asset('uploads/post_placeholder.jpeg') }}">
            @endif
            
        </article>
</div>
@endsection
