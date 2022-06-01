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
    <label for="slug">Slug</label>
    <input type="text" class="form-control" id="slug"
            name="slug" value="{{ $model->slug }}" /> 
</div>

<div class="form-group">
    <label for="excerpt">Exceprt</label>
    <textarea  class="form-control" id="excerpt" name="excerpt" >{{ $model->excerpt }}</textarea>
</div>


<div class="form-group date">
    <label for="published_at">Published Date/time</label>


            <input type="text" class="form-control datepicker"  id="published_at"
            name="published_at" value="{{ $model->published_at }}" />
    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
</div>


<div class="form-group">
    <label for="content">Body</label>
    <!--<textarea class="form-control" id="content" name="content">{{ $model->content }}</textarea>-->
    <textarea class="ckeditor form-control" name="body" id="body" >{{ $model->body }}</textarea>
</div>

<div class="form-group">
    <input type="submit" class="btn btn-default" value="submit" /> 
</div>