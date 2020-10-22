@foreach($items as $key=>$item)
	<li @if($depth == 0) class=" @if(isset($item->children)) dropdown @endif" @else @if(isset($item->children)) class="dropdown-submenu mul" @endif @endif>

		@if($depth == 0)
			<a href="{{$item->slug}}">

				{{$item->title}}
			</a>
		@else
			<a href="{{$item->slug}}" @if(isset($item->children)) data-toggle="dropdown" class="dropdown-toggle" @endif>
				@php $pos = strpos('.png', $item->title); @endphp
				@if (strpos($item->title, '.png'))
					<img src="{{$item->title}}" align="middle">
				@elseif(strpos($item->title, '.jpg'))
					<img src="{{$item->title}}" align="middle">
				@else
					{{$item->title}}
				@endif
			</a>
		@endif
		@if(isset($item->children))

				<ul class="dropdown-menu multilevel" role="menu">
					@include('client.common.menu', ['items'=>$item->children, 'depth'=>1+$depth, 'type'=>$type])
				</ul>


	@endif
	<li>
@endforeach
