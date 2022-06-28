@extends('layouts.frontend')

@section('title') {{ 'portfolio' }} @endsection

@section('content')
<div class="container">
    @foreach($portfolio as $portfolio)

        <article>
            <h2>
                <a href="{{ route('portfolio.view' , ['slug' => $portfolio->slug])}}">{{$portfolio->title}}</a>
            </h2>

            @if($portfolio->image != null)
                <img height="100" width=100 src="{{ asset('uploads/portfolio/' . $portfolio->image) }}">
            @else
                <img height="100" width=100 src="{{ asset('uploads/post_placeholder.jpeg') }}">
            @endif


            <p>{{$portfolio->content}}</p>


        </article>

    @endforeach
</div>
@endsection
