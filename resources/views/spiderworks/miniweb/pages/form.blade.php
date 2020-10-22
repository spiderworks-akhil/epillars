@extends('spiderworks.miniweb.fileupload')

@section('head')

@endsection

@section('content')
    <div class="container-fluid">

        <div class="col-md-12" style="margin-bottom: 20px;" align="right">
            @if($obj->id)
                <span class="page-heading">EDIT PAGE</span>
            @else
                <span class="page-heading">CREATE NEW PAGE</span>
            @endif
            <div >
                <div class="btn-group">
                    <a href="{{route($route.'.index')}}"  class="btn btn-success"><i class="fa fa-list"></i> List
                    </a>
                    @if($obj->id)
                    <a href="{{route($route.'.create')}}" class="btn btn-success"><i class="fa fa-pencil"></i> Create new
                    </a>
                    <a href="{{route($route.'.destroy', [encrypt($obj->id)])}}" class="btn btn-success miniweb-btn-warning-popup" data-message="Are you sure to delete?  Associated data will be removed if it is deleted." data-redirect-url="{{route($route.'.index')}}"><i class="fa fa-trash"></i> Delete</a>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card card-borderless">
                @if($obj->id)
                    <form method="POST" action="{{ route($route.'.update') }}" class="p-t-15" id="PageFrm" data-validate=true>
                @else
                    <form method="POST" action="{{ route($route.'.store') }}" class="p-t-15" id="PageFrm" data-validate=true>
                @endif
                @csrf
                <input type="hidden" name="id" @if($obj->id) value="{{encrypt($obj->id)}}" @endif id="inputId">

                <ul class="nav nav-tabs nav-tabs-simple d-none d-md-flex d-lg-flex d-xl-flex" role="tablist" data-init-reponsive-tabs="dropdownfx">
                    <li class="nav-item">
                        <a class="active show" data-toggle="tab" role="tab"
                           data-target="#tab1Basic"
                        href="#" aria-selected="true">Basic Details</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" data-toggle="tab" role="tab"
                           data-target="#tab2Content"
                        class="" aria-selected="false">Content</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" data-toggle="tab" role="tab"
                           data-target="#tab3SEO"
                        class="" aria-selected="false">SEO</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" data-toggle="tab" role="tab"
                           data-target="#tab4Media"
                           class="" aria-selected="false">Media</a>
                    </li>

                    <li class="nav-item">
                        <a href="#" data-toggle="tab" role="tab"
                           data-target="#tab5"
                           class="" aria-selected="false">FAQ</a>
                    </li>

                    <li class="nav-item">
                        <a href="#" data-toggle="tab" role="tab"
                           data-target="#tab6"
                           class="" aria-selected="false">Banners</a>
                    </li>

                    <li class="nav-item">
                        <a href="#" data-toggle="tab" role="tab"
                           data-target="#tab7"
                           class="" aria-selected="false">CTA</a>
                    </li>

                    <li class="nav-item">
                        <a href="#" data-toggle="tab" role="tab"
                           data-target="#tab8"
                           class="" aria-selected="false">Location</a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane active show" id="tab1Basic">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row column-seperation padding-5">
                                    <div class="form-group form-group-default required">
                                        <label>Title</label>
                                        <input type="text" name="name" class="form-control" value="{{$obj->name}}" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row column-seperation padding-5">
                                    <div class="form-group form-group-default required">
                                        <label class="">Slug (for url)</label>
                                        <input type="text" name="slug" class="form-control" value="{{$obj->slug}}" id="slug">
                                    </div>
                                    <p class="hint-text small">The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row column-seperation padding-5">
                                    <div class="form-group form-group-default">
                                        <label>Short Description</label>
                                        <textarea name="short_description" class="form-control" rows="3" id="short_description">{{$obj->short_description}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row column-seperation padding-5">
                                    <div class="form-group form-group-default required">
                                        <label>Content</label>
                                        <textarea name="content" class="form-control richtext" id="content" data-image-url="{{route('spiderworks.miniweb.summernote.image')}}">{{$obj->content}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab2Content">
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="row column-seperation padding-5">
                                        <div class="form-group form-group-default required">
                                            <label>Top content</label>
                                            <textarea name="top_description" class="form-control richtext" id="top_description" data-image-url="{{route('spiderworks.miniweb.summernote.image')}}">{{$obj->top_description}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row column-seperation padding-5">
                                        <div class="form-group form-group-default required">
                                            <label>Bottom content</label>
                                            <textarea name="bottom_description" class="form-control richtext" id="bottom_description" data-image-url="{{route('spiderworks.miniweb.summernote.image')}}">{{$obj->bottom_description}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="row column-seperation padding-5">
                                        <div class="form-group form-group-default">
                                            <label class="">Extra Css</label>
                                            <textarea name="extra_css" class="form-control" rows="3" id="extra_css">{{$obj->extra_css}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row column-seperation padding-5">
                                        <div class="form-group form-group-default">
                                            <label class="">Extra Js</label>
                                            <textarea name="extra_js" class="form-control" rows="3" id="extra_js">{{$obj->extra_js}}</textarea>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab3SEO">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="row column-seperation padding-5">
                                    <div class="form-group form-group-default">
                                        <label>Browser title</label>
                                        <input type="text" class="form-control" name="browser_title" id="browser_title" value="{{$obj->browser_title}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row column-seperation padding-5">
                                    <div class="form-group form-group-default">
                                        <label class="">Meta Keywords</label>
                                        <textarea name="meta_keywords" class="form-control" rows="3" id="meta_keywords">{{$obj->meta_keywords}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row column-seperation padding-5">
                                    <div class="form-group form-group-default">
                                        <label class="">Meta description</label>
                                        <textarea name="meta_description" class="form-control" rows="3" id="meta_description">{{$obj->meta_description}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab4Media">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <p class="col-md-12">Featured Image - left</p>
                                    <div class="default-image-holder padding-5">
                                        <a href="javascript:void(0);" class="image-remove"><i class="fa  fa-times-circle"></i></a>
                                        <a href="{{route('spiderworks.miniweb.media.popup', ['popup_type'=>'single_image', 'type'=>'Image', 'holder_attr'=>'0', 'related_id'=>$obj->id])}}" class="miniweb-open-ajax-popup" title="Media Images" data-popup-size="large" id="image-holder-0">
                                          @if($obj->media_id && $obj->featured_image)
                                            <img class="card-img-top padding-20" src="{{ asset('public/'.$obj->featured_image->thumb_file_path) }}">
                                          @else
                                            <img class="card-img-top padding-20" src="{{asset('miniweb/img/add_image.png')}}">
                                          @endif
                                        </a>
                                        <input type="hidden" name="media_id" id="mediaId0" value="{{$obj->media_id}}">
                                    </div>
                              </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <p class="col-md-12">Featured Image - right</p>
                                    <div class="default-image-holder padding-5">
                                        <a href="javascript:void(0);" class="image-remove"><i class="fa  fa-times-circle"></i></a>
                                        <a href="{{route('spiderworks.miniweb.media.popup', ['popup_type'=>'single_image', 'type'=>'Image', 'holder_attr'=>'1', 'related_id'=>$obj->id])}}" class="miniweb-open-ajax-popup" title="Media Images" data-popup-size="large" id="image-holder-1">
                                            @if($obj->media_right_id && $obj->featured_image_right)
                                                <img class="card-img-top padding-20" src="{{ asset('public/'.$obj->featured_image_right->thumb_file_path) }}">
                                            @else
                                                <img class="card-img-top padding-20" src="{{asset('miniweb/img/add_image.png')}}">
                                            @endif
                                        </a>
                                        <input type="hidden" name="media_right_id" id="mediaId1" value="{{$obj->media_right_id}}">
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="tab-pane" id="tab5">
                        @if($obj->id)
                                <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <label>FAQ title</label>
                                    <input type="text" class="form-control" name="faq_title" value="{{$obj->faq_title}}">
                                    <label>FAQ Description</label>
                                    <textarea type="text" class="form-control" name="faq_desc" value="{{$obj->faq_desc}}"></textarea>
                                </div>
                            </div>




                                    <div class="col-md-12">
                                        <div class="row">
                                            <h6>FAQ List</h6>


                                            <div class="col-md-12">
                                                <div id="faq-list"></div>
                                                <li style="list-style: initial">
                                                    <a data-path="{{ route('faq_form',[$obj->id,0]) }}"
                                                       class="load-ajax-modal" role="button"
                                                       type="button" style="color: green;cursor: pointer">create new</a>
                                                </li>
                                            </div>
                                        </div>
                                    </div>


                        </div>
                            @else
                                <div class="row">
                                    Window will be active when the page save for the first time.
                                </div>
                        @endif
                    </div>
                    <div class="tab-pane" id="tab6">
                        @if($obj->id)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label>Banner title</label>
                                        <input type="text" class="form-control" name="banner_title" value="{{$obj->banner_title}}">
                                        <label>Banner Description</label>
                                        <textarea type="text" class="form-control" name="banner_desc" value="{{$obj->banner_desc}}"></textarea>
                                    </div>
                                </div>




                                <div class="col-md-12">
                                    <div class="row">
                                        <h6>Banner List</h6>


                                        <div class="col-md-12">
                                            <div id="banner-list"></div>
                                            <li style="list-style: initial">
                                                <a data-path="{{ route('banner_form',[$obj->id,0]) }}"
                                                   class="load-ajax-modal" role="button"
                                                   type="button" style="color: green;cursor: pointer">create new</a>
                                            </li>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        @else
                            <div class="row">
                                Window will be active when the page save for the first time.
                            </div>
                        @endif



                    </div>
                    <div class="tab-pane" id="tab7">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label>CTA title</label>
                                        <input type="text" class="form-control" name="cta_title" value="{{$obj->cta_title}}">

                                        <label >CTA action link (Leave it blank for popup)</label>
                                        <input type="text" class="form-control" name="cta_action"  value="{{$obj->cta_action}}">

                                        <label >CTA action button label</label>
                                        <input type="text" class="form-control" name="cta_action_btn_label"  value="{{$obj->cta_action_btn_label}}">


                                        <label style="display: block;width: 100%;">CTA Banner [Size : 1170 X 300]</label>

                                        <div class="default-image-holder padding-5" >
                                            <a href="javascript:void(0);" class="image-remove"><i class="fa  fa-times-circle"></i></a>
                                            <a href="{{route('spiderworks.miniweb.media.popup', ['popup_type'=>'single_image', 'type'=>'Image', 'holder_attr'=>'4', 'related_id'=>$obj->id])}}" class="miniweb-open-ajax-popup" title="Media Images" data-popup-size="large" id="image-holder-4">
                                                @if($obj->cta_image_id && $obj->cta_bg)
                                                    <img class="card-img-top padding-20" src="{{ asset('public/'.$obj->cta_bg->thumb_file_path) }}">
                                                @else
                                                    <img class="card-img-top padding-20" src="{{asset('miniweb/img/add_image.png')}}">
                                                @endif
                                            </a>
                                            <input type="hidden" name="cta_image_id" id="mediaId4" value="{{$obj->cta_image_id}}">
                                        </div>
                                    </div>


                                    </div>
                                </div>



                            </div>

                    <div class="tab-pane" id="tab8">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <label>Location title</label>
                                    <input type="text" class="form-control" name="location_title" value="{{$obj->location_title}}">

                                    <label >Map</label>
                                    <input type="text" class="form-control" name="location_iframe"  value="{{$obj->location_iframe}}">


                                </div>
                            </div>
                        </div>



                    </div>



                    </div>
                    <div class="row">
                        <div class="col-md-12" align="right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@section('bottom')


    <script type="text/javascript">

        const remove_faq = banner_id => {
            $.get('{{url('faq/remove/')}}/'+banner_id).done(function () {
                $('.log').hide();
                $("#faq_form").after('<span class="log" style="color:green">Faq removed successfully</span>')
                fetch_faq();
                setTimeout(function () {
                    $('#myModal').modal('hide');
                },1000)
            })
        }



        $('.load-ajax-modal').click(function(){
            $.ajax({
                type : 'GET',
                url : $(this).data('path'),
                success: function(result) {
                    $('#myModalBody').html(result);
                    $("#myModal").modal()
                }
            });
        });

        @if($obj->id)

        function fetch_faq() {
            $.ajax({
                type : 'GET',
                url : '{{route('faq_show',$obj->id)}}',
                success: function(result) {
                    $('#faq-list').html(result);
                }
            });
        }

        function fetch_banners() {
            $.ajax({
                type : 'GET',
                url : '{{route('banner_show',$obj->id)}}',
                success: function(result) {
                    $('#banner-list').html(result);
                }
            });
        }
        fetch_banners();


        fetch_faq();

        @endif



        function string_to_slug (str) {
            str = str.replace(/^\s+|\s+$/g, ''); // trim
            str = str.toLowerCase();

            // remove accents, swap ñ for n, etc
            var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
            var to   = "aaaaeeeeiiiioooouuuunc------";
            for (var i=0, l=from.length ; i<l ; i++) {
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }

            str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes

            return str;
        }

        $("input[name=name]").change(function () {
            $("input[name=slug]").val(string_to_slug($("input[name=name]").val()))
        })



        var validator = $('#PageFrm').validate({
            ignore: [],
            rules: {
                "name": "required",
                slug: {
                  required: true,
                  remote: {
                      url: "{{route('spiderworks.miniweb.unique.page-slug')}}",
                      data: {
                        id: function() {
                          return $( "#inputId" ).val();
                      }
                    }
                  }
                },
                content: {
                  required: function(textarea) {
                     return $('#'+textarea.id).summernote('isEmpty');
                  }
                },
              },
              messages: {
                "name": "Page title cannot be blank",
                slug: {
                  required: "Slug cannot be blank",
                  remote: "Slug is already in use",
                },
                "description": "Page content cannot be blank",
              },
            });
    </script>
@parent
@endsection