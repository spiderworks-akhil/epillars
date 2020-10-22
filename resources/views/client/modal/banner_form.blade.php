<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('banner_save')}}" id="banner_form" method="post" enctype="multipart/form-data">@csrf
                <label for="question">Banner title</label>
                    <input type="text" class="form-control" name="title" placeholder="title" value="{{$obj->title}}">

                <label for="question">Banner Description</label>
                    <textarea type="text" class="form-control" name="description" placeholder="description" rows="5">{{$obj->description}}</textarea>
                <label for="">Banner size : 345 X 180</label>
                <div class="default-image-holder padding-5">

                    <a href="javascript:void(0);" class="image-remove"><i class="fa  fa-times-circle"></i></a>
                    <a href="{{route('spiderworks.miniweb.media.popup', ['popup_type'=>'single_image', 'type'=>'Image', 'holder_attr'=>'2', 'related_id'=>$obj->id])}}" class="miniweb-open-ajax-popup" title="Media Images" data-popup-size="large" id="image-holder-2">
                        @if($obj->image_id && $obj->image)
                            <img class="card-img-top padding-20" src="{{ asset('public/'.$obj->image->thumb_file_path) }}">
                        @else
                            <img class="card-img-top padding-20" src="{{asset('miniweb/img/add_image.png')}}">
                        @endif
                    </a>
                    <input type="hidden" name="image_id" id="mediaId2" value="{{$obj->image_id}}" required>
                </div>

                <input type="hidden" name="page_id" value="{{$id}}">
                <input type="hidden" name="id" value="{{$obj->id}}">

                @if($obj->id) <button class="btn btn-danger btn-submit remove-banner" data-id="{{encrypt($obj->id)}}" type="button" >@if($id == 'new')  @else Remove @endif</button> @endif
                <button class="btn btn-success btn-submit" type="submit">@if($id == 'new') Add @else Update @endif</button>
            </form>
        </div>
    </div>
</div>

<script>
    $( document ).ready(function () {
        $("#banner_form").validate({
            rules : {
                media_id:{
                    required : true,
                }
            },
            submitHandler: function(form) {
                $('.log').hide();
                if($('#mediaId2').val().length <= 0){$("#banner_form").after('<span class="log" style="color:red">Please add an image</span>');return false;}
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function(response) {
                        console.log(response)
                        $("#banner_form").after('<span class="log" style="color:green">New Banner added successfully</span>')
                        fetch_banners();
                        setTimeout(function () {
                            $('#myModal').modal('hide');
                        },1000)

                    }
                });
            }
        })


        const remove_banner = banner_id => {
            $.get('{{url('banner/remove/')}}/'+banner_id).done(function () {
                $('.log').hide();
                $("#banner_form").after('<span class="log" style="color:green">Banner removed successfully</span>')
                fetch_banners();
                setTimeout(function () {
                    $('#myModal').modal('hide');
                },1000)
            })
        }

        $('.remove-banner').click(function () {
            remove_banner($(this).data('id'))
        })


    })
</script>
