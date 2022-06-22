{!! csrf_field() !!}

@if(!$errors->isEmpty())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title"
            name="title" value="{{ $model->title }}" />
</div>

<div class="form-group">
    <label for="subtitle">SubTitle</label>
    <input type="text" class="form-control" id="subtitle"
            name="subtitle" value="{{ $model->subtitle }}" />
</div>

<div class="form-group">
    <label for="btn_title">btn title</label>
    <input type="text" class="form-control" id="btn_title"
            name="btn_title" value="{{ $model->btn_title }}" /> 
</div>

<div class="form-group">
    <label for="btn_url">btn url</label>
    <input type="text" class="form-control" id="btn_url"
            name="btn_url" value="{{ $model->btn_url }}" /> 
</div>



<div class="form-group">
    <label for="image">Image</label>
    <input type="file" placeholder="Image" name="image" id="image">
    @if($model->image != null)
        <img height="100" width=100 src="{{ asset('uploads/' . $model->image) }}">
    @else
        <img style="visibility:hidden"  id="prview" src=" {{ asset('uploads/' . $model->image) }} "  width=100 height=100 />     
    @endif
    
</div>

<div class="form-group">
    <input type="submit" class="btn btn-default" value="submit" /> 
</div>