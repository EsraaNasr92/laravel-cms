@extends('layouts.frontend')

@section('title') {{ 'home' }} @endsection

@section('content')
<div class="banner" style="background-image: url('{{ asset('/uploads/' . $banner->image) }}')">
        <div class="banner-content">
            <h2>{{$banner->title}}</h2>
            <h4>{{$banner->subtitle}}</h4>
            <a href="{{ $banner -> btn_url}}" class="btn btn-primary" target="_blank">{{ $banner->btn_title }}</a>
         <!-- <img src="{{ asset('/uploads/' . $banner->image) }}"  class="img-fluid" alt="">  -->
        </div>    
    </div>
    
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
