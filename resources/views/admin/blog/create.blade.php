@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
       
        <div class="col-md-8">
            <h1>Create new post</h1>

            <form action="{{ route('blog.store') }}" method="post">
                @include('admin.blog.partials.fields')
            </form>
        </div>
    </div>
</div>
@endsection
