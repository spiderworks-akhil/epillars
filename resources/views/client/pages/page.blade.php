@extends('client.layout.base')

@section('meta_title',$page->browser_title)
@section('meta_description',$page->meta_description )
@section('meta_keywords',$page->meta_keywords)
@section('extra_css',$page->extra_css)
@section('extra_js',$page->extra_js)

@section('content')

    <div class="page_title">
        <div class="container">
            <div class="clearfix margin_top2"></div>
            <h1>{{$page->name}}</h1>
        </div>
    </div>

    <div class="content_fullwidth">
        <div class="container">
            <br />

            @if($page->featured_image)
            <div class="one_half"><img src="{{asset($page->featured_image->file_path)}}" alt="software training dubai" class="img_size1" /></div>
            @endif
            <!-- end section -->
            <div class="one_half last">
                {!! $page->content !!}
            </div>
            <!-- end section -->
        </div>
        <div class="clearfix"></div>
        <div class="fusection5">
            <div class="container">
                @if($page->banner_title)<h2>{{$page->banner_title}}</h2>@endif
                @if($page->banner_desc)<p>{{$page->banner_desc}}</p>@endif
                <br />

                @foreach($banners as $obj)
                    @if($obj->image)
                        <div class="one_third animate" data-anim-type="fadeInUp" data-anim-delay="200">
                            <img src="{{asset($obj->image->file_path)}}" alt="ssl certificate dubai uae" />
                            <br /><br />
                            @if($obj->title) <h4>{{$obj->title}}</h4> @endif
                            @if($obj->description) <p>{{$obj->description}}</p> @endif
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <!-- end features section 5 -->
        <div class="content_fullwidth">
            <div class="container">
                <div class="one_half">
                    {!! $page->top_description !!}
                </div>
                @if($page->featured_image_right)
                    <div class="one_half last">
                        <img src="{{asset($page->featured_image_right->file_path)}}">
                    </div>
                @endif
            </div>
            <!-- end content area -->
            <!-- call to action -->
            @if($page->cta_title)
            <section class="cta-action">
                <div class="meet-us-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="meet-us-item bg_cover d-flex align-items-center justify-content-between"
                                     @if($page->cta_bg) style="background-image: url('{{asset($page->cta_bg->file_path)}}')" @else style="background: #27a22d" @endif>
                                    <div class="fl-cta">
                                        <h2 class="title">{{$page->cta_title}}</h2>
                                        <button class="main-btn" @if($page->cta_action != null) href="{{$page->cta_action}}"  @else href="#" data-toggle="modal" data-target="#apply_now" @endif><span>{{$page->cta_action_btn_label}}</span><span class="fa fa-long-arrow-right"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endif
            <!-- /end -->

            @if($page->location_iframe)
            <div style="text-align: center;">
                <h3><strong>{{  $page->location_title }}</strong></h3>
            </div>
            <div class="one_full">
                {!! $page->location_iframe !!}
            </div>
            <div class="clearfix"></div>
            @endif

            @widget('clients')

            <div class="clearfix margin_top8"></div>
            <div class="ecf-form">
                <div class="cforms container">
                    <h2 class="untext"><strong>Get Started Today!</strong></h2>
                    <form action="#" method="post" id="sky-form" class="sky-form" novalidate="novalidate">
                        <fieldset>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="label">First Name</label>
                                    <label class="input"> <i class="icon-append icon-user"></i>
                                        <input type="text" name="name" id="name">
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="label">Last Name</label>
                                    <label class="input"> <i class="icon-append icon-user"></i>
                                        <input type="text" name="name" id="name">
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="label">E-mail</label>
                                    <label class="input"> <i class="icon-append icon-envelope-alt"></i>
                                        <input type="email" name="email" id="email">
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="label">Phone Number</label>
                                    <label class="input"> <i class="icon-append icon-tag"></i>
                                        <input type="text" name="subject" id="subject">
                                    </label>
                                </section>
                                <section class="col col-12">
                                    <label class="label">Message</label>
                                    <label class="textarea">
                                        <grammarly-extension style="position: absolute; top: 0px; left: 0px; pointer-events: none;"
                                                             class="_1KJtL"></grammarly-extension> <i class="icon-append icon-comment"></i>
                                        <textarea rows="4" name="message" id="message" spellcheck="false"></textarea>
                                        <input type="hidden" name="demo" value="off">
                                    </label>
                                </section>
                            </div>
                            <footer>
                                <button type="button" class="button cn-btn" id="btn-validate" style="display: block;">
                                    Contact Now
                                    <i class="fa fa-refresh fa-spin"></i>
                                </button>
                            </footer>
                        </fieldset>
                    </form>

                </div>
            </div>

            @if(count($faq) >= 1)
            <!-- faq section -->
            <div class="epiller-faq">
                <div class="container">
                    <div class="section-title">
                        <h2>{{$page->faq_title}}</h2>
                        <p>{{$page->faq_desc}}</p>
                    </div>
                    <div class="row1">
                        <div class="content">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                                    <div class="row">


                                    @foreach($faq as $obj)
                                            <div class="col-md-6" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" id="heading{{$loop->index}}" role="tab">
                                            <h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion"
                                                                       href="#collapse{{$loop->index}}" @if($loop->index == 0) aria-expanded="true" @else aria-expanded="false" @endif class="collapsed" aria-controls="collapse{{$loop->index}}">{{$obj->question}} #{{1 + $loop->index}}<i
                                                            class="pull-right fa fa-plus"></i></a></h4>
                                        </div>
                                        <div class="panel-collapse collapse @if($loop->index == 0) in @endif" id="collapse{{$loop->index}}" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <p style="padding: 5px">{{$obj->answer}}</p>
                                            </div>
                                        </div>
                                    </div>
                                            </div>
                                    @endforeach


                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="content">
                                <div class="panel-group" id="accordion" >

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- fffffffffffffffffffffffffffff -->

                </div>
            </div>
            <!-- end -->
            @endif

            @if($page->bottom_description)
            <div class="ep-ftr">
                <div class="container">
                    {!! $page->bottom_description !!}
                </div>
            </div>
            @endif

            <!-- end footer -->
            <div class="clearfix"></div>

            <!-- end copyright info -->
            <a href="#" class="scrollup">Scroll</a><!-- end scroll to top of the page-->
        </div>

    </div>

    <!-- modal starts pop-up -->
    <div class="modal fade" id="apply_now" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog apply-dialog" role="document">
            <div class="modal-content apply-content">
                <button type="button" class="close apply-close-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body apply-body">
                    <div class="apply-container">
                        <div class="row apply-row">
                            <div class="col-md-4 leadform-left">
                                <div class="leadform-flex">
                                    <div class="leadform-card">
                                        <div class="lc-con"><img src="img/team.png" alt="">
                                            <p>An Experienced Team</p>
                                        </div>
                                    </div>
                                    <div class="leadform-card">
                                        <div class="lc-con"><img src="img/expose.png" alt="">
                                            <p>Wide Exposure to Market</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="leadform-flex">
                                    <div class="leadform-card">
                                        <div class="lc-con"><img src="img/service.png" alt="">
                                            <p>Custom-Tailored Services</p>
                                        </div>
                                    </div>
                                    <div class="leadform-card">
                                        <div class="lc-con"><img src="img/support.png" alt="">
                                            <p>Quick & Trusted Support</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="leadform-flex">
                                    <div class="leadform-card">
                                        <div class="lc-con"><img src="img/individual.png" alt="">
                                            <p>A Diverse Clientele</p>
                                        </div>
                                    </div>
                                    <div class="leadform-card">
                                        <div class="lc-con"><img src="img/provider.svg" alt="">
                                            <p>One-Stop Solution Provider</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 leadform-right">
                                <form id="popupform" method="POST"
                                      action="#">
                                    <input type="hidden" name="_token" value="MXphNTw5jfq48oQTSrESQrESNNMhnIkX0HWBVG8k">
                                    <div class="leadform-header">
                                        <div class="lead-hdr-img align-self-center">
                                            <img
                                                    src="img/apply.png">
                                        </div>
                                        <div class="lead-hdr-info align-self-center">
                                            <h3 id="js-leadform-heading">How Can We Help ?</h3>
                                            <p class="pop_dec">Please fill out your inquiry the form below, and our sales team will get in touch with you to schedule a meeting.</p>
                                        </div>
                                    </div>

                                    <div class="form-section row">
                                        <div class="form-fields  col-md-6">
                                            <label class="materialize-label">
                                                <input name="name" type="text" class="clear" placeholder=" ">
                                                <span>First Name</span>
                                                <span class="icon-lead-input">
                              <svg id="icon-lead-name" viewBox="0 0 24 24">
                                <path
                                        d="M12 4a4 4 0 0 1 4 4 4 4 0 0 1-4 4 4 4 0 0 1-4-4 4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4z">
                                </path>
                              </svg>
                            </span>
                                            </label>
                                            <span class="text-danger ajax-error" id="name_contact_error"></span>
                                        </div>
                                        <div class="form-fields  col-md-6">
                                            <label class="materialize-label">
                                                <input name="name" type="text" class="clear" placeholder=" ">
                                                <span>Last Name</span>
                                                <span class="icon-lead-input">
                              <svg id="icon-lead-name" viewBox="0 0 24 24">
                                <path
                                        d="M12 4a4 4 0 0 1 4 4 4 4 0 0 1-4 4 4 4 0 0 1-4-4 4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4z">
                                </path>
                              </svg>
                            </span>
                                            </label>
                                            <span class="text-danger ajax-error" id="name_contact_error"></span>
                                        </div>
                                        <div class="form-fields  col-md-6">
                                            <label class="materialize-label">
                                                <input name="email" type="text" class="clear" placeholder=" ">
                                                <span>Email Address</span>
                                                <span class="icon-lead-input">
                              <svg id="icon-lead-email" viewBox="0 0 24 24">
                                <path
                                        d="M20 8l-8 5-8-5V6l8 5 8-5m0-2H4c-1.11 0-2 .89-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z">
                                </path>
                              </svg>
                            </span>
                                            </label>
                                            <span class="text-danger ajax-error" id="email_contact_error"></span>
                                        </div>
                                        <!-- <div class="form-fields  col-md-6">
                                          <label class="materialize-label">
                                            <input name="location" type="text" class="clear" placeholder=" ">
                                            <span>Location</span>
                                            <span class="icon-lead-input">
                                              <svg id="icon-lead-city" viewBox="0 0 512 512">
                                                <path
                                                  d="M256 0C161.896 0 85.333 76.563 85.333 170.667c0 28.25 7.063 56.26 20.49 81.104L246.667 506.5c1.875 3.396 5.448 5.5 9.333 5.5s7.458-2.104 9.333-5.5l140.896-254.813c13.375-24.76 20.438-52.771 20.438-81.021C426.667 76.563 350.104 0 256 0zm0 256c-47.052 0-85.333-38.281-85.333-85.333S208.948 85.334 256 85.334s85.333 38.281 85.333 85.333S303.052 256 256 256z">
                                                </path>
                                              </svg>
                                            </span>
                                          </label>
                                          <span class="text-danger ajax-error" id="location_contact_error"></span>
                                        </div> -->
                                        <div class="form-fields  col-md-6">
                                            <label class="materialize-label">
                                                <input name="mobile_no" type="text" class="clear" placeholder=" ">
                                                <span>Mobile Number</span>
                                                <span class="icon-lead-input">
                              <svg id="icon-lead-phone_no" viewBox="0 0 24 24">
                                <path
                                        d="M6.62 10.79c1.44 2.83 3.76 5.15 6.59 6.59l2.2-2.2c.28-.28.67-.36 1.02-.25 1.12.37 2.32.57 3.57.57a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z">
                                </path>
                              </svg>
                            </span>
                                            </label>
                                            <span class="text-danger ajax-error" id="mobile_no_contact_error"></span>
                                        </div>
                                        <input type="hidden" name="branch_id" id="branch_id" value="">
                                        <input type="hidden" name="title_pass" id="title_pass" value="">
                                        <input type="hidden" name="picked_path" value="admission">
                                        <input type="hidden" name="popup_type" id="popup_type" value="">
                                    </div>


                                    <div class="agree-section">
                        <span>By submitting this form, you accept and agree to our <a target="_blank" href="#">Terms of
                            Use.</a></span>
                                    </div>
                                    <div class="act-sb">
                                        <button type="submit" class="registerbtn btn-change btn_hover" id="contact-btn">APPLY
                                            NOW</button>
                                    </div>
                                </form>
                                <!--<hr class="sep_frm">
                                 <div class="contact_ss text-center">
                                  <a href="tel:+971 557 188 763‎">
                                    <div class="cc-contact call-opt">
                                      <div class="cc_inr_contact">
                                        <span> Call </span>
                                        <i class="fa fa-phone"></i>
                                      </div>
                                    </div>
                                  </a>
                                  <a href="https://wa.me/971551144916" target="_blank"></a>
                                  <div class="cc-contact wtsp-opt">
                                    <div class="cc_inr_contact">
                                      <span> Chat </span>
                                      <i class="fab fa-whatsapp"></i>
                                    </div>
                                  </div>
                                  </a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal end -->

    <style>
        .margin_top5{
            margin-top: 0px;
        }
    </style>
@endsection