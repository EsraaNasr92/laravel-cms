@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-info" >
                    {{ session('status') }}
                </div>
            @endif
            

        <h2><span>Menus</span></h2>

        <div class="info-box">		
            @if(count($menus) > 0)		
                Select a menu to edit: 		
                <form action="{{url('manage-menus')}}" class="form-inline">
                <select name="id">
                    @foreach($menus as $menu)
                        @if($selectedMenu != '')
                        <option value="{{$menu->id}}" @if($menu->id == $selectedMenu->id) selected @endif>{{$menu->title}}</option>
                    @else
                        <option value="{{$menu->id}}">{{$menu->title}}</option>
                    @endif
                    @endforeach
                </select>
                <button class="btn btn-sm btn-default btn-menu-select">Select</button>
                </form> 
                or <a href="{{url('manage-menus?id=new')}}">Create a new menu</a>.	
            @endif 
        </div>

        <div class="grid grid-cols-12 gap-6" id="main-row">				
            <div class="col-span-12 2xl:col-span-3 cat-form @if(count($menus) == 0) disabled @endif">
            <h3><span>Add Menu Items</span></h3>			

            <div class="panel-group" id="menu-items">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#categories-list" data-toggle="collapse" data-parent="#menu-items">Pages <span class="caret pull-right"></span></a>
                    </div>
                <div class="panel-collapse collapse in" id="categories-list">
                        <div class="panel-body">						
                            <div class="item-list-body">
                                @foreach($pages as $page)
                                <p><input type="checkbox" name="select-category[]" value="{{$page->id}}"> {{$page->title}}</p>
                                @endforeach
                            </div>	
                        <div class="item-list-footer">
                            <label class="btn btn-sm btn-default"><input type="checkbox" id="select-all-categories"> Select All</label>
                            <button type="button" class="pull-right btn btn-default btn-sm" id="add-categories">Add to Menu</button>
                        </div>
		            </div>	
            </div>		<!-- End pages -->		

            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="#posts-list" data-toggle="collapse" data-parent="#menu-items">posts <span class="caret pull-right"></span></a>
                    </div>
                    <div class="panel-collapse collapse" id="posts-list">
                        <div class="panel-body">						
                            <div class="item-list-body">
                            @foreach($model as $post)
                            
                                <p><input type="checkbox" name="select-post[]" value="{{$post->id}}"> {{$post->title}}</p>
                            @endforeach
                            </div>	
                            <div class="item-list-footer">
                            <label class="btn btn-sm btn-default"><input type="checkbox" id="select-all-posts"> Select All</label>
                            <button type="button" id="add-posts" class="pull-right btn btn-default btn-sm">Add to Menu</button>
                        </div>
                </div>						
            </div><!-- End Posts-->





            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="#custom-links" data-toggle="collapse" data-parent="#menu-items">Custom Links <span class="caret pull-right"></span></a>
                    </div>
                    <div class="panel-collapse collapse" id="custom-links">
                        <div class="panel-body">						
                            <div class="item-list-body">
                            <div class="form-group">
                                <label>URL</label>
                                <input type="url" id="url" class="form-control" placeholder="https://">
                            </div>
                            <div class="form-group">
                                <label>Link Text</label>
                                <input type="text" id="linktext" class="form-control" placeholder="">
                                </div>
                            </div>	
                            <div class="item-list-footer">
                                <button type="button" class="pull-right btn btn-default btn-sm" id="add-custom-link">Add to Menu</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>	
            </div>	
            
            
        </div>
     </div>


        <div class="col-span-12 2xl:col-span-9 cat-view">
            <h3><span>Menu Structure</span></h3>
            @if($selectedMenu == '')
                <h4>Create New Menu</h4>
                <form method="post" action="{{url('create-menu')}}">
                  {{csrf_field()}}
                  <div class="row">
                  <div class="col-sm-12">
                    <label>Name</label>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">							
                    <input type="text" name="title" class="form-control">
                    </div>
                  </div>
                  <div class="col-sm-6 text-right">
                    <button class="btn btn-sm btn-primary">Create Menu</button>
                  </div>
                  </div>
                </form>
            @else
                <div id="menu-content">
                  <div id="result"></div>
                  <div style="min-height: 240px;">
                    <p>Select categories, pages or add custom links to menus.</p>
                    @if($selectedMenu != '')
                    <ul class="menu ui-sortable" id="menuitems">
                        @if(!empty($menuitems))
                          
                            @foreach($menuitems as $key=>$menuitem)
                            <li data-id="{{$menuitem->id}}">
                                <span class="menu-item-bar">
                                  <i class="fa fa-arrows"></i> 
                                  @if(!empty($menuitem->name)) {{$menuitem->name}} @else {{$menuitem->title}} @endif 
                                  <a href="#collapseMenu{{$menuitem->id}}" class="pull-right" data-toggle="collapse">
                                  <i class="caret"></i></a>
                                </span>
                                
                            
                                  <div class="collapse" id="collapseMenu{{$menuitem->id}}">
                                    <div class="input-box">
                                      <form method="post" action="{{url('update-menuitem')}}/{{$menuitem->id}}">
                                          {{csrf_field()}}
                                          <div class="form-group">
                                          <label>Link Name</label>
                                          <input type="text" name="title" value="@if(!empty($menuitem->name)) {{$menuitem->name}} @else {{$menuitem->title}} @endif" class="form-control">
                                          </div>
                                          @if($menuitem->type == 'custom')
                                          <div class="form-group">
                                            <label>URL</label>
                                            <input type="text" name="slug" value="{{$menuitem->slug}}" class="form-control">
                                          </div>					
                                          <div class="form-group">
                                            <input type="checkbox" name="target" value="_blank" @if($menuitem->target == '_blank') checked @endif> Open in a new tab
                                          </div>
                                          @endif
                                          <div class="form-group">
                                          <button class="btn btn-sm btn-primary">Save</button>
                                          <a href="{{url('delete-menuitem')}}/{{$menuitem->id}}/{{$key}}" class="btn btn-sm btn-danger">Delete</a>
                                          </div>
                                      </form>
                                  </div>
                                </div>

                            <ul>  
                                  
                                  @if(isset($menuitem->children))
                                    
                                  @foreach($menuitem->children as $child)

                                  @foreach($child as $in=>$child)


                                  <li data-id="{{$child->id}}"> 
                                    <span class="menu-item-bar">
                                      <i class="fa fa-arrows"></i> 
                                      @if(!empty($child->name)) {{$child->name}} @else {{$child->title}} @endif 
                                      <a href="#collapseChild{{$child->id}}" class="pull-right" data-toggle="collapse">
                                      <i class="caret"></i></a>
                                    </span>
                                    
                                        <div class="collapse" id="collapseChild{{$child->id}}">
                                          
                                              <form method="post" action="{{url('update-menuitem')}}/{{$child->id}}">
                                                  {{csrf_field()}}
                                                  <div class="form-group">
                                                  <label>Link Name</label>
                                                  <input type="text" name="title" value="@if(!empty($child->name)) {{$child->name}} @else {{$child->title}} @endif" class="form-control">
                                                  </div>
                                                  @if($child->type == 'custom')
                                                  <div class="form-group">
                                                    <label>URL</label>
                                                    <input type="text" name="slug" value="{{$child->url}}" class="form-control">
                                                  </div>					
                                                  <div class="form-group">
                                                    <input type="checkbox" name="target" value="_blank" @if($child->target == '_blank') checked @endif> Open in a new tab
                                                  </div>
                                                  @endif
                                                  <div class="form-group">
                                                  <button class="btn btn-sm btn-primary">Save</button>
                                                  <a href="{{url('delete-menuitem')}}/{{$child->id}}/{{$key}}/{{$in}}" class="btn btn-sm btn-danger">Delete</a>
                                                  </div>
                                              </form>
                                          
                                        </div>
                                      @endforeach
                                    
                                      @endforeach
                                  @endif
                                  </ul>
                              </li>
                            @endforeach
                          </ul>

                          <div class="form-group menulocation">
                              <label><b>Menu Location</b></label>
                              <p><label><input type="radio" name="location" value="header" @if($selectedMenu->location == 'header') checked @endif> Header</label></p>
                              <p><label><input type="radio" name="location" value="2" @if($selectedMenu->location == 2) checked @endif> Main Navigation</label></p>
                          </div>
                          <div class="form-group">
                            <a href="{{url('delete-menu')}}/{{$selectedMenu->id}}" class="delete">Delete Menu</a>
                          </div>
                          <div class="text-right">
                              
                              <button class="btn btn-sm btn-primary" id="saveMenu">Save Menu</button>
                          </div>

                          @endif
                        @endif
                  </div>	



            @endif	
            
          </div>	
            </div>
          </div>
          <div id="serialize_output">@if($selectedMenu){{$selectedMenu->content}}@endif</div>	
                   
        </div><!-- #End menu structure-->


    </div><!-- #End row-->
</div><!-- #End Container-->



<style>
  .item-list,.info-box{background: #fff;padding: 10px;}
  .item-list-body{max-height: 300px;overflow-y: scroll;}
  .panel-body p{margin-bottom: 5px;}
  .info-box{margin-bottom: 15px;}
  .item-list-footer{padding-top: 10px;}
  .panel-heading a{display: block;}
  .form-inline{display: inline;}
  .form-inline select{padding: 4px 10px;}
  .btn-menu-select{padding: 4px 10px}
  .disabled{pointer-events: none; opacity: 0.7;}


  .menu-item-bar{background: #eee;padding: 5px 10px;border:1px solid #d7d7d7;margin-bottom: 5px; width: 75%; cursor: move;display: block;}
  
  .menulocation label{font-weight: normal;display: block;}
  body.dragging, body.dragging * {cursor: move !important;}
  .dragged {position: absolute;z-index: 1;}
  ol.example li.placeholder {position: relative;}
  ol.example li.placeholder:before {position: absolute;}
  #menuitem{list-style: none;}
  #menuitem ul{list-style: none;}
  .input-box{width:75%;background:#fff;padding: 10px;box-sizing: border-box;margin-bottom: 5px;}
  .input-box .form-control{width: 50%}
  .menulocation label{font-weight: normal;display: block;}
  #serialize_output{display:none}
</style>



@if($selectedMenu)
<script>
  $('#add-categories').click(function(){
  var menuid = <?=$selectedMenu->id?>;
  var n = $('input[name="select-category[]"]:checked').length;
  var array = $('input[name="select-category[]"]:checked');
  var ids = [];
  for(i=0;i<n;i++){
    ids[i] =  array.eq(i).val();
  }
  if(ids.length == 0){
	return false;
  }
  $.ajax({
	type:"get",
	data: {menuid:menuid,ids:ids},
	url: "{{url('add-categories-to-menu')}}",				
	success:function(res){				
      location.reload();
	}
  })
})
$('#add-posts').click(function(){
  var menuid = <?=$selectedMenu->id?>;
  var n = $('input[name="select-post[]"]:checked').length;
  var array = $('input[name="select-post[]"]:checked');
  var ids = [];
  for(i=0;i<n;i++){
	ids[i] =  array.eq(i).val();
  }
  if(ids.length == 0){
	return false;
  }
  $.ajax({
	type:"get",
	data: {menuid:menuid,ids:ids},
	url: "{{url('add-post-to-menu')}}",				
	success:function(res){
  	  location.reload();
	}
  })
})

   $("#add-custom-link").click(function(){
  var menuid = <?=$selectedMenu->id?>;
  var url = $('#url').val();
  var link = $('#linktext').val();
  if(url.length > 0 && link.length > 0){
	$.ajax({
	  type:"get",
	  data: {menuid:menuid,url:url,link:link},
	  url: "{{url('add-custom-link')}}",				
	  success:function(res){
	    location.reload();
	  }
	})
  }
});

var group = $("#menuitems").sortable({
  group: 'serialization',
  onDrop: function ($item, container, _super) {
    var data = group.sortable("serialize").get();	    
    var jsonString = JSON.stringify(data, null, '');
    $('#serialize_output').text(jsonString);
  	  _super($item, container);
  }
});



$('#saveMenu').click(function(){
  var menuid = <?=$selectedMenu->id?>;
  var location = $('input[name="location"]:checked').val();
  var newContent = $("#serialize_output").text();
  var data = JSON.parse($("#serialize_output").text());	
  $.ajax({
    type:"get",
	data: {menuid:menuid,data:data,location:location},
	url: "{{url('save-menu')}}",				
	success:function(res){
	  window.location.reload();
	}
  })	
})
</script>
@endif

@endsection

