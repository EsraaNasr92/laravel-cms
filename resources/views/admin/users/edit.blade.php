@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
       
        <div class="col-md-8">
            <h1>Edit {{$model->name }}</h1>

            <form action="{{ route('users.update', ['user' => $model->id]) }}" method="post">
                {{ method_field('PUT') }}
                
                
                @foreach($roles as $role)
                    <div class="checkbox">
                        <label>
                            <input 
                                type="checkbox" 
                                name="role[]" 
                                value="{{ $role->id }}" 
                                {{ $model->hasRole($role->name)? 'checked': '' }} 
                               
                            />
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="submit" class="btn btn-default" value="submit" /> 
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
