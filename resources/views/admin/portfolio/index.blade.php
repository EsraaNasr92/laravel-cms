@extends('layouts.app')

@section('content')

<div class="container">
   <a class="btn btn-primary" href="{{ route('portfolio.create') }}" >Create new project</a>

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
                            <th>slug</th>
                            <th>content</th>
                            <th>Options</th>
                        </tr>
                    </thead>

                    @foreach($model as $portfolio)
                    <tr>
                        <td> {{ $portfolio -> title}}</td>
                        <td> {{ $portfolio -> slug}}</td>
                        <td> {{ $portfolio -> content}}</td>
                        <td> 
                            <a href="{{ route('portfolio.edit', ['portfolio' => $portfolio->id] ) }}">Edit</a> | 
                            <form action="{{ route('portfolio.destroy',$portfolio->id) }}" method="POST" >
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">Delete</button>
                            </form>
                    </tr>
                       
                    @endforeach

                </table>
            </table>

            {{ $model->links('pagination::bootstrap-4') }}
        </div>

    </div>
</div>
@endsection
