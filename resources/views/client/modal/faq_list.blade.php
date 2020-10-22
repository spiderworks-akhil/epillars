<ol>
    @foreach($faq_details as $obj)
    <li>
        {{$obj->question}} - <a data-path="{{ route('faq_form',[$obj->page_id,$obj->id]) }}"
                                class="load-ajax-modal" role="button" data-id="{{$obj->id}}" style="cursor:pointer">edit</a>
        {{--<br>{{$obj->answer}}--}}
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
