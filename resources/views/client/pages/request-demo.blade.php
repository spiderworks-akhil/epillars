@extends('client.layout.base')

@isset($page)
@section('meta_title',$page->browser_title)
@section('meta_description',$page->meta_description )
@section('meta_keywords',$page->meta_keywords)
@section('extra_css',$page->extra_css)
@section('extra_js',$page->extra_js)
@endif

@section('content')

    <div class="site_wrapper">



        <div class="clearfix"></div>

        <div class="page_title3">
            <div class="container">

                <div class="title"><h1>Demo</h1></div>


            </div>
        </div><!-- end page title -->

        <div class="clearfix margin_top3"></div>

        <div class="container">

            <div class="content_fullwidth lessmar">

                <div class="one_half">


                    <div class="cforms">

                        <form action="contacts.php" method="post" id="sky-form" class="sky-form" novalidate="novalidate">
                            <header>Fill up the following form to get product <strong>Demo</strong></header>
                            <fieldset>
                                <div class="row">
                                    <section class="col col-6">
                                        <label class="label">Name</label>
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
                                </div>
                                <section>
                                    <label class="label">Phone Number</label>
                                    <label class="input"> <i class="icon-append icon-tag"></i>
                                        <input type="number" name="subject" id="subject">
                                    </label>
                                </section>

                                <section>
                                    <label class="label">Select the required product demo</label> <i class="icon-append icon-comment"></i>

                                    <select name="product" id="product" style="width: -webkit-fill-available; height: 30px;border-color:#d3d3d3;" onchange="CheckColors(this.value);">
                                        <option value="DocuSign">DocuSign</option>
                                        <option value="Cornerstone Learning Management">Cornerstone Learning Management</option>
                                        <option value="Cornerstone Talent Management">Cornerstone Talent Management</option>
                                        <option value="Automated Org Charting">Automated Org Charting</option>
                                        <option value="Odoo ERP Systems">Odoo ERP Systems</option>
                                        <option value="Cisco Webex">Cisco Webex</option>
                                        <option value="Business Software">Business Software</option>
                                        <option value="Video Conferecing Solutions">Video Conferecing Solutions</option>
                                        <option value="Facility Management Software(CAFM)">Facility Management Software(CAFM)</option>
                                        <option value="Digital Signature Solutions">Digital Signature Solutions</option>
                                        <option value="Information Security Solutions">Information Security Solutions</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </section>

                                <section>
                                    <label class="textarea">
                                        <textarea rows="4" name="message" id="message" style="display:none;" placeholder="Other details"></textarea>
                                        <input type="hidden" name="demo" value="on">
                                    </label>
                                </section>
                                <section>
                                    <span class="msg-error state-error"></span>
                                    <div id="recaptcha" class="g-recaptcha" data-sitekey="6LcDKS8UAAAAAJqnInox0A7ZLyYH4GCdjVRbZW9i"><div style="width: 304px; height: 78px;"><div><iframe src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LcDKS8UAAAAAJqnInox0A7ZLyYH4GCdjVRbZW9i&amp;co=aHR0cHM6Ly93d3cuZXBpbGxhcnMuY29tOjQ0Mw..&amp;hl=en&amp;v=T9w1ROdplctW2nVKvNJYXH8o&amp;size=normal&amp;cb=drfy3s2ns55o" width="304" height="78" role="presentation" name="a-7a8i3lmbkvg4" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea></div><iframe style="display: none;"></iframe></div>
                                </section>
                            </fieldset>
                            <footer>
                                <button type="submit" class="button" id="btn-validate">Send message</button>
                            </footer>
                            <div class="message"> <i class="icon-ok"></i>
                                <p>Your message was successfully sent!</p>
                            </div>
                        </form>

                    </div>

                </div>

                <script>
                    function notifyep(myno) {
                        $.ajax({
                            type: "POST",
                            url: 'https://www.epillars.com/takenote.php',
                            data:{action:myno},
                            success:function(html) {
                                //alert(html);
                                return;
                            }

                        });
                    }
                </script>

                <script src="https://www.google.com/recaptcha/api.js"></script>
                <div class="one_half last">

                    <div class="address_info">

                        <h4>Company <strong>Address</strong></h4>
                        <ul>
                            <li> <strong>ePillars Systems LLC</strong><br>
                                #208, Le Solarium, Silicon Oasis - Dubai<br>
                                Telephone: <a href="tel:+97143263939" onclick="notifyep('043263939')"> +971 4 326 3939</a><br>
                                FAX: +971 4 326 3939<br>
                                E-mail: <a href="mailto:info@epillars.com">info@epillars.com</a><br>
                                Website: <a href="index.html">www.epillars.com</a> </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <h4>Find the <strong>Address</strong></h4>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3612.43550995057!2d55.398516!3d25.120963!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f64741e4e2055%3A0x78b5723be93c8be!2sePillars+Systems+L.L.C!5e0!3m2!1sen!2sae!4v1414586096827&amp;wmode=transparent" width="600" height="450" frameborder="0" style="border:0"></iframe>
                    <br>
                    <small><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=WA,+United+States&amp;aq=0&amp;oq=WA&amp;sll=47.605288,-122.329296&amp;sspn=0.008999,0.016544&amp;ie=UTF8&amp;hq=&amp;hnear=Washington,+District+of+Columbia&amp;t=m&amp;z=7&amp;iwloc=A">View Larger Map</a></small> </div>

            </div>

        </div><!-- end content area -->

        <div class="clearfix margin_top5"></div>

    </div>

@endsection