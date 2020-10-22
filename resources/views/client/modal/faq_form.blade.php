<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('faq_save')}}" id="faq_form" method="post">@csrf
                <label for="question">Question</label>
                    <input type="text" class="form-control" name="que" placeholder="question" value="{{$obj->question}}">

                <label for="question">Answer</label>
                    <textarea type="text" class="form-control" name="answer" placeholder="answer" rows="5">{{$obj->answer}}</textarea>

                <input type="hidden" name="page_id" value="{{$id}}">
                <input type="hidden" name="id" value="{{$obj->id}}">


                @if($obj->id) <button class="btn btn-danger btn-submit remove-faq" data-id="{{encrypt($obj->id)}}" type="button" >@if($id == 'new')  @else Remove @endif</button> @endif
                <button class="btn btn-success btn-submit" type="submit">@if($id == 'new') Add @else Update @endif</button>
            </form>
        </div>
    </div>
</div>

<script>
    $( document ).ready(function () {
        $("#faq_form").validate({
            rules : {
                que:{
                    required : true,
                },
                answer:{
                    required : true,
                }
            },
            submitHandler: function(form) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function(response) {
                        $("#faq_form").after('<span style="color:green">New FAQ added successfully</span>')
                        fetch_faq();
                        setTimeout(function () {
                            $('#myModal').modal('hide');
                        },1000)

                    }
                });
            }
        })
    })



</script>

<script>


    $('.remove-faq').click(function () {

        remove_faq($(this).data('id'))
    })



</script>

