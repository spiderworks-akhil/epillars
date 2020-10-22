@foreach($items as $key=>$item)
    <li class="mobile-links__item" data-collapse-item>
        <div class="mobile-links__item-title">
            <a href="{{$item->slug}}" class="mobile-links__item-link">

                @php $pos = strpos('.png', $item->title); @endphp
                @if (strpos($item->title, '.png'))
                    <img src="{{$item->title}}" align="middle">
                @elseif(strpos($item->title, '.jpg'))
                    <img src="{{$item->title}}" align="middle">
                @else
                    {{$item->title}}
                @endif

            </a>
            @if(isset($item->children))
                <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                    <i class="fa fa-chevron-down"></i>
                </button>
            @endif
        </div>
        @if(isset($item->children))
            <div class="mobile-links__item-sub-links" data-collapse-content>
                <ul class="mobile-links mobile-links--level--1">
                    @include('client.common.mobilemenu', ['items'=>$item->children, 'depth'=>1+$depth])
                </ul>
            </div>
        @endif
    </li>
@endforeach