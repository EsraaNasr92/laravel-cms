@extends('layouts.frontend')

@section('content')
<div class="container">
        <article>
            <h2>
                <a href="{{ route('blog.view' , ['slug' => $post->slug]) }}">{{$post->title}}</a>
            </h2>
            <p>published by: {{$post->user->name}} on {{$post->published_at}}</p>
            <p>{!! $post->body !!}</p>
        </article>
</div>
@endsection
