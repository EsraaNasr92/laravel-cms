@extends('layouts.app')

@section('content')

<div class="container">
<a class="btn btn-primary" href="{{ route('banner.create') }}" >Create banner</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('status'))
                <div class="alert alert-info" >
                    {{ session('status') }}
                </div>
            @endif
            <table class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Image</th>
                            <th>btn title</th>
                            <th>btn slug</th>
                        </tr>
                    </thead>

                    @foreach($model as $banner)
                    <tr>
                        <td> {{ $banner -> title}}</td>
                        <td> {{ $banner -> subtitle}}</td>
                        <td> <img height="100" width=100 src="{{ asset('uploads/' . $banner -> image) }}"> </td>
                        <td> {{ $banner -> btn_title}}</td>
                        <td> {{ $banner -> btn_url}}</td>
                        <td> 
                            <a href="{{ route('banner.edit', ['banner' => $banner->id] ) }}">Edit</a> | 
                            <form action="{{ route('banner.destroy',$banner->id) }}" method="POST" >
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">Delete</button>
                            </form>
                    </tr>
                       
                    @endforeach

                </table>
            </table>

            
        </div>

    </div>
</div>
@endsection
