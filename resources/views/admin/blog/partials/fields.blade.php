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


<div class="form-group position-relative">
    <label for="published_at">Published Date/time</label>


    <input 
        type="text" 
        class="form-control datatimepicker-input"  
        id="published_at"
        name="published_at" 
        data-target="#published_at"
        data-toggle="datetimepicker"
        value="{{ $model->published_at }}" 
    />
    
</div>

<div class="form-group">
    <label for="image">Image</label>
    <input type="file" placeholder="Image" name="image" id="image">
    

    @if($model->image != null)
        <img height="100" width=100 src="{{ asset('uploads/posts/' . $model->image) }}">
    @else
        <img style="visibility:hidden"  id="prview" src=" {{ asset('uploads/posts/' . $model->image) }} "  width=100 height=100 />     
    @endif

    
    
</div>

<div class="form-group">
    <label for="content">Body</label>
    <!--<textarea class="form-control" id="content" name="content">{{ $model->content }}</textarea>-->
    <textarea class="ckeditor form-control" name="body" id="body" >{{ $model->body }}</textarea>
</div>

<div class="form-group">
    <label for="category_id">Category</label>
    <select class="form-control" name="category_id" required>
        <option value="">Select a Category</option>

        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id === old('category_id') ? 'selected' : '' }}>{{ $category->name }}</option>
            @if ($category->children)
                @foreach ($category->children as $child)
                    <option value="{{ $child->id }}" {{ $child->id === old('category_id') ? 'selected' : '' }}>&nbsp;&nbsp;{{ $child->name }}</option>
                @endforeach
            @endif
        @endforeach
    </select>
</div>

<div class="form-group">
    <input type="submit" class="btn btn-default" value="submit" /> 
</div>