@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
       
        <div class="col-md-8">
            <h1>Create banner</h1>

            <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                @include('admin.banner.partials.fields')
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('admin.banner.partials.scripts')
@endsection
