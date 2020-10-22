<ol>
    @foreach($banners as $obj)
    <li>
        @if($obj->image) <img src="{{asset($obj->image->thumb_file_path)}}" alt="" style="    width: 30px;"> @endif
        {{$obj->title}} - <a data-path="{{ route('banner_form',[$obj->page_id,$obj->id]) }}"
                                class="load-ajax-modal" role="button" data-id="{{$obj->id}}" style="cursor:pointer">edit</a>
    </li>
    @endforeach

</ol>
<script>

    $('.load-ajax-modal').click(function(){
        $.ajax({
            type : 'GET',
            url : $(this).data('path'),
            success: function(result) {
                console.log(result);
                $('#myModalBody').html(result);
                $("#myModal").modal()
            }
        });
    });
</script>
