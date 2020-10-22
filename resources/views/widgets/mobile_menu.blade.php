@foreach($menu_items as $mMenu)
    @include('client.common.mobilemenu', ['items'=>$mMenu['menu'], 'depth'=>0, 'type'=>$mMenu['type']])
@endforeach