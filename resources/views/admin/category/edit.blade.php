@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
       
        <div class="col-md-8">
            <h1>Edit post</h1>

            <form action="{{ route('blog.update', ['blog' => $model->id]) }}" method="post" enctype="multipart/form-data">
                {{ method_field('PUT') }}

                @include('admin.blog.partials.fields')
            </form>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    @include('admin.category.partials.scripts')
@endsection