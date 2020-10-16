@foreach($items as $key=>$item)
	<li @if($depth == 0) class=" @if(isset($item->children)) dropdown @endif" @else class="dropdown-submenu mul" @endif>

		@if($depth == 0)
			<a href="{{$item->slug}}">

				{{$item->title}}
			</a>
		@else
			<a href="#" data-toggle="dropdown" class="dropdown-toggle">
				@php $pos = strpos('.png', $item->title); @endphp
				@if (strpos($item->title, '.png'))
					<img src="{{$item->title}}" align="middle">
				@else
					{{$item->title}}
				@endif
			</a>
		@endif
		@if(isset($item->children))

				<ul class="dropdown-menu multilevel" role="menu">
					@include('client.common.menu', ['items'=>$item->children, 'depth'=>++$depth, 'type'=>$type])
				</ul>


	@endif
	<li>
@endforeach
