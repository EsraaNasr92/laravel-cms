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

    <h3>This is partner section</h3>

    @foreach($partner as $partner)

        <article>
            <h2>
                <a href="{{ route('partner.view' , ['slug' => $partner->slug])}}">{{$partner->title}}</a>
            </h2>

            <p>{{$partner->content}}</p>


        </article>

        @endforeach

    <h3>This is services section</h3>

    @foreach($service as $service)

    <article>
        <h2>
            <a href="{{ route('services.view' , ['slug' => $service->slug])}}">{{$service->title}}</a>
        </h2>

        @if($service->image != null)
            <img height="100" width=100 src="{{ asset('uploads/services/' . $service->image) }}">
        @else
            <img height="100" width=100 src="{{ asset('uploads/post_placeholder.jpeg') }}">
        @endif

        <p>{{$service->content}}</p>


    </article>

    @endforeach
</div>
@endsection
