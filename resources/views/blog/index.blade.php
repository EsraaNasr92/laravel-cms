@extends('layouts.frontend')

@section('title') {{ 'blog' }} @endsection

@section('content')
<div class="container">
    @foreach($posts as $post)

        <article>
            <h2>
                <a href="{{ route('blog.view' , ['slug' => $post->slug])}}">{{$post->title}}</a>
            </h2>
            <p>{{$post->excerpt}}</p>
            <p class="text-muted">{{ $post->category ? $post->category->name : 'Uncategorized' }}</p>
        </article>

    @endforeach
</div>
@endsection
