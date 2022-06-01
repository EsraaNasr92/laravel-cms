@extends('layouts.app')

@section('content')

<div class="container">
   <a class="btn btn-primary" href="{{ route('blog.create') }}" >Create new page</a>

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
                            
                            <th>Slug</th>
                            <th>Published</th>
                            <th>Options</th>
                        </tr>
                    </thead>

                    @foreach($model as $post)
                    <tr>
                        <td> {{ $post -> title}}</td>
                       
                        <td> {{ $post -> slug}}</td>
                        <td> {{ $post -> published_at }}</td>
                        <td> 
                            <a href="{{ route('blog.edit', ['blog' => $post->id] ) }}">Edit</a> | 
                            <form action="{{ route('blog.destroy',$post->id) }}" method="POST" >
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                       
                    @endforeach

                </table>
            </table>

            {{ $model->links('pagination::bootstrap-4') }}
        </div>

        
    </div>
</div>
@endsection
