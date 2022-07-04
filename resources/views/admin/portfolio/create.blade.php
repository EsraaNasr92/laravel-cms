@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
       
        <div class="col-md-8">
            <h1>Create new project</h1>

            <form action="{{ route('portfolio.store') }}" method="post" enctype="multipart/form-data">
                @include('admin.portfolio.partials.fields')
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('admin.portfolio.partials.scripts')
@endsection
