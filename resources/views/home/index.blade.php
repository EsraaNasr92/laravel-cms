@extends('layouts.frontend')

@section('title') {{ 'home' }} @endsection

@section('content')
<div class="container">
   <h3>This is post section</h3> 

    @foreach($posts as $post)

        <article>
            <h2>
                <a href="{{ route('blog.view' , ['slug' => $post->slug])}}">{{$post->title}}</a>
            </h2>

            <p>{{$post->excerpt}}</p>


        </article>

        @endforeach

    <h3>This is post partner</h3>

    @foreach($partner as $partner)

        <article>
            <h2>
                <a href="{{ route('partner.view' , ['slug' => $partner->slug])}}">{{$partner->title}}</a>
            </h2>

            <p>{{$partner->content}}</p>


        </article>

        @endforeach
</div>
@endsection
