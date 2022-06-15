<ul class="nav navbar-nav navbar-right">
  <li><a href="{{url('/')}}">home</a></li>
  @if(!empty($topNavItems))
	@foreach($topNavItems as $nav)
	  @if(!empty($nav->children[0]))
		<li><a href="#" class="dropdown" data-toggle="dropdown">@if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif <i class="caret"></i>
		  <ul class="dropdown-menu">
			@foreach($nav->children[0] as $childNav)
			  @if($childNav->type == 'custom')
				<li><a href="{{$childNav->slug}}" target="_blank">@if($childNav->name == NULL) {{$childNav->title}} @else {{$childNav->name}} @endif</a></li>
			  @elseif($childNav->type == 'post')
				<li><a href="{{url('blog')}}/{{$childNav->slug}}">@if($childNav->name == NULL) {{$childNav->title}} @else {{$childNav->name}} @endif</a></li>
			  @else
				<li><a href="{{$childNav->slug}}">@if($childNav->name == NULL) {{$childNav->title}} @else {{$childNav->name}} @endif</a></li>	
			  @endif
			@endforeach
		  </ul>
		</a></li>
      @else
		@if($nav->type == 'custom')
		  <li><a href="{{$nav->slug}}" target="_blank">@if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a></li>
		@elseif($nav->type == 'post')
		  <li><a href="{{url('blog')}}/{{$nav->slug}}">@if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a></li>
		@else
		  <li><a href="{{$nav->slug}}">@if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a></li>	
		@endif
	  @endif	
	@endforeach
  @endif					
  <li><a href="{{route('blog')}}">Blog</a></li>
</ul>	