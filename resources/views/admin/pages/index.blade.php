@extends('layouts.app')

@section('content')

<div class="container">
   <a class="btn btn-primary" href="{{ route('pages.create') }}" >Create new page</a>

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
                            <th>Url</th>
                            <th>Options</th>
                        </tr>
                    </thead>

                    @foreach($pages as $page)
                    <tr>
                        <td> {{ $page -> title}}</td>
                        <td> {{ $page -> url}}</td>
                        <td> 
                            <a href="{{ route('pages.edit', ['page' => $page->id] ) }}">Edit</a> | 
                            <form action="{{ route('pages.destroy',$page->id) }}" method="POST" >
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">Delete</button>
                            </form>
                    </tr>
                       
                    @endforeach

                </table>
            </table>

            {{ $pages->links('pagination::bootstrap-4') }}
        </div>

    </div>
</div>
@endsection
