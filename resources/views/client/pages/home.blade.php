@extends('client.layout.base')

@section('content')
    <div class="container_full slidertop">
        <div class="master-slider ms-skin-default" id="masterslider">
            <!-- slide -->
            <div class="ms-slide slide-1" data-delay="5">
                <!-- slide background -->
                <img src="{{asset('/')}}/old/js/masterslider/blank.gif" data-src="{{asset('/')}}/old/images/sliders/master/slide-bg3.jpg" alt="business software in dubai"/> <img src="{{asset('/')}}/old/js/masterslider/blank.gif" data-src="{{asset('/')}}/old/images/sliders/master/man-with-card.png" alt="IT service company in Dubai"
                                                                                                                                            style="left:670px; top:70px;"
                                                                                                                                            class="ms-layer"
                                                                                                                                            data-type="image"
                                                                                                                                            data-effect="right(300)"
                                                                                                                                            data-ease="easeOutExpo"
                                                                                                                                            data-duration="900"
                                                                                                                                            data-delay="300"
                />
                <h3 class="ms-layer stext9"
                    style="left: 935px; top: 370px;"
                    data-type="text"
                    data-duration="900"
                    data-delay="900"
                    data-ease="easeOutExpo"
                    data-effect="scale(1.5,1.6)"
                > One Stop for <br />
                    <strong>All your Needs</strong>
                </h3>
                <h1 class="ms-layer stext6"
                    style="left: 65px; top: 335px;"
                    data-type="text"
                    data-duration="900"
                    data-delay="1800"
                    data-ease="easeOutExpo"
                    data-effect="bottom(40)"
                > <strong>Improve your <em>Business</em> with us</strong> </h1>
                <p class="ms-layer stext7"
                   style="left: 65px; top: 400px;"
                   data-type="text"
                   data-duration="900"
                   data-delay="2500"
                   data-ease="easeOutExpo"
                   data-effect="bottom(40)"
                > Business software  |  IT infrastructure  |  Video conferencing   </p>
                <div class="ms-layer"
                     style="left: 130px; top: 550px;"
                     data-type="text"
                     data-delay="3500"
                     data-ease="easeOutExpo"
                     data-duration="900"
                     data-effect="scale(1.5,1.6)"
                > </div>
            </div>
            <!-- end of slide -->
            <!-- slide -->
            <div class="ms-slide slide-2" data-delay="5">
                <!-- slide background -->
                <img src="{{asset('/')}}/old/js/masterslider/blank.gif" data-src="{{asset('/')}}/old/images/sliders/master/slide-bg1.jpg" alt="open erp software in dubai"/>
                <h1 class="ms-layer stext3"
                    style="top: 335px;"
                    data-type="text"
                    data-duration="900"
                    data-delay="800"
                    data-ease="easeOutExpo"
                    data-effect="bottom(40)"
                > Our advanced solutions helps in making your business<br />
                    <strong>Smooth and Secure</strong>
                </h1>
                <h4 class="ms-layer stext3"
                    style="top: 470px;"
                    data-type="text"
                    data-duration="900"
                    data-delay="1500"
                    data-ease="easeOutExpo"
                    data-effect="bottom(40)"
                > Highly advanced ERP solutions for your business. </h4>
                <div class="ms-layer"
                     style="top: 550px;"
                     data-type="text"
                     data-delay="2000"
                     data-ease="easeOutExpo"
                     data-duration="900"
                     data-effect="scale(1.5,1.6)"
                > <a href="odoo-open-erp-accounting-software-dubai.html" class="sbutton4">Learn more</a> </div>
            </div>
            <!-- end of slide -->
            <!-- slide -->
            <div class="ms-slide slide-3" data-delay="5">
                <!-- slide background -->
                <img src="{{asset('/')}}/old/js/masterslider/blank.gif" data-src="{{asset('/')}}/old/images/sliders/master/slide-bg2.jpg" alt="HR solution software in dubai UAE"/>
                <h1 class="ms-layer stext4"
                    style="left: 130px; top: 335px;"
                    data-type="text"
                    data-duration="900"
                    data-delay="800"
                    data-ease="easeOutExpo"
                    data-effect="bottom(40)"
                > <strong>Easy </strong>and<em> <strong>Affordable</em></strong><br />
                    HR solutions
                </h1>
                <h4 class="ms-layer stext5"
                    style="left: 130px; top: 470px;"
                    data-type="text"
                    data-duration="900"
                    data-delay="1500"
                    data-ease="easeOutExpo"
                    data-effect="bottom(40)"
                > Create professional org charts with very little time and effort. </h4>
                <div class="ms-layer"
                     style="left: 130px; top: 550px;"
                     data-type="text"
                     data-delay="2500"
                     data-ease="easeOutExpo"
                     data-duration="900"
                     data-effect="scale(1.5,1.6)"
                > <a href="orgplus-organisation-charting-software-Dubai.html" class="sbutton4">Learn more</a> </div>
            </div>
            <!-- end of slide -->
        </div>
    </div>


    <div class="clearfix"></div>
    <div class="fusection6">
        <div class="container">
            <h2 class="untext">what <strong>We Do</strong></h2>
            <ul class="tt-wrapper">
                <li class="animate" data-anim-type="zoomIn" data-anim-delay="200"><a> <img src="{{asset('/')}}/old/images/icon-5.png" alt="accounting software, billing software dubai" />
                        <h6>Business Software</h6>
                        <span>ERP Solutions, Organization Charting Software, Talent Management Solutions, Learning Management Solutions</span></a></li>
                <li style="margin-left:60px;" class="animate" data-anim-type="zoomIn" data-anim-delay="300"><a> <img src="{{asset('/')}}/old/images/icon-6.png" alt="wifi cctv camera dubai" />
                        <h6>IT Infrastructure Solutions</h6>
                        <span>Enterprise WiFi Networking, Surveillance and Security Solutions, IP PBX, IP Telephones, Unified Communication Solutions, CCTV Cameras</span></a></li>
                <li style="margin-left:60px;" class="animate" data-anim-type="zoomIn" data-anim-delay="600"><a> <img src="{{asset('/')}}/old/images/icon-9.png" alt="network security, internet security" />
                        <h6>Information Security</h6>
                        <span>Network Access Controls, Firewall, Digital Certificates</span></a></li>
                <li style="margin-left:60px;" class="animate" data-anim-type="zoomIn" data-anim-delay="500"><a href="aver-hd-video-conference-camera-dubai.html"> <img src="{{asset('/')}}/old/images/icon-8.png" alt="aver video conferencing camera" />
                        <h6>Video Conferencing</h6>
                        <span>High Definition Video Conferencing Solutions</span></a></li>
                <!--<li class="animate" data-anim-type="zoomIn" data-anim-delay="700"><a href="ncomputing-thin-client-virtual-desktops-Dubai-Abu-Dhabi.html"> <img src="{{asset('/')}}/old/images/icon-10.png" alt="NComputing thin client comuting" /> <h6>Thin Client Computing</h6> <span>Thin client computers, VDI, Servers</span></a></li>-->
                <li style="margin-left:60px;" class="animate" data-anim-type="zoomIn" data-anim-delay="400"><a href="idrawings-dubai.html"> <img src="{{asset('/')}}/old/images/icon-facility.png" alt="Facility Management Solutions in dubai" />
                        <h6>Facility Management Solutions</h6>
                        <span> Web-Based Computer Aided Facilities Management  Systems and Integrated Workplace Management Systems Application Software and Services</span></a></li>
            </ul>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="fusection1">
        <div class="container">
            <h2 class="untext">Featured <strong>Products</strong></h2>
            <div class="one_fourth animate" data-anim-type="fadeIn" data-anim-delay="200">
                <div class="icon"><img src="{{asset('/')}}/old/images//icon-1.png" alt="odoo open erp software Dubai" /></div>
                <h4> ERP Software <br/>Solution</h4>
                <p>A powerful  ERP solution for your business</p>
                <br />
                <br />
                <a href="odoo-open-erp-accounting-software-dubai.html">Learn more</a> </div>
            <!-- end section -->
            <div class="one_fourth animate" data-anim-type="fadeIn" data-anim-delay="400">
                <div class="icon"><img src="{{asset('/')}}/old/images//docusign.png" alt="docusign e-signature solution" /></div>
                <h4>Digital Signature (eSignature) solutions</h4>
                <p>Move business forward securely and reliably</p>
                <br>
                <br />
                <a href="docusign-dubai.html">Learn more</a> </div>
            <!-- end section -->
            <div class="one_fourth animate" data-anim-type="fadeIn" data-anim-delay="600">
                <div class="icon"><img src="{{asset('/')}}/old/images//org-manager.png" alt="orgplus org charting software dubai" /></div>
                <h4>Automated Organization Charting</h4>
                <p>Automated HR Visualization & org charting tool</p>
                <br>
                <br />
                <a href="orgmanager-organisation-charting-software-Dubai.html">Learn more</a> </div>
            <!-- end section -->
            <div class="one_fourth last animate" data-anim-type="fadeIn" data-anim-delay="800">
                <div class="icon"><img src="{{asset('/')}}/old/images//icon-3.png" alt="orgplus org charting software dubai" /></div>
                <h4>Organization Charting Software</h4>
                <p>Feature rich Organization charting software</p>
                <br>
                <br />
                <a href="orgplus-organisation-charting-software-Dubai.html">Learn more</a> </div>
            <!-- end section -->
        </div>
        <br><br>
        <div class="container">

            <div class="one_fourth animate" data-anim-type="fadeIn" data-anim-delay="200">
                <div class="icon"><img src="{{asset('/')}}/old/images//icon-2.png" alt="saba talent management software Dubai" /></div>
                <h4>Learning & Talent Management Software</h4>
                <p>The Complete Talent and Learning Management solutions for your Organization</p>
                <br />
                <br />
                <a href="saba-talent-management-dubai.html">Learn more</a> </div>
            <!-- end section -->
            <div class="one_fourth animate" data-anim-type="fadeIn" data-anim-delay="400">
                <div class="icon"><img src="{{asset('/')}}/old/images//icon-4.png" alt="aver video conferencing camera" /></div>
                <h4>HD Video Conferencing Solution</h4>
                <p>High Definition Video Conferencing solution</p>
                <br>
                <br>
                <br />
                <a href="aver-hd-video-conference-camera-dubai.html">Learn more</a> </div>
            <!-- end section -->
            <div class="one_fourth animate" data-anim-type="fadeIn" data-anim-delay="600">
                <div class="icon"><img src="{{asset('/')}}/old/images//vlogic-cafm.png" alt="Facilities Management Software Dubai, Abudhabi, Sharjah" style="margin-top: 40px" /></div>
                <h4>Facilities Management (CAFM)Software</h4>
                <p>Web-Based Computer Aided Facilities Management (CAFM)Software</p>
                <br>
                <br>
                <br />
                <a href="idrawings-dubai.html">Learn more</a> </div>
            <!-- end section -->
            <div class="one_fourth last animate" data-anim-type="fadeIn" data-anim-delay="800">
                <div class="icon"><img src="{{asset('/')}}/old/images//hreye-log.png" alt="aver video conferencing camera" /></div>
                <h4>HReye-Complete & Intelligent HR Suite</h4>
                <p>Employee Self Services(ESS), Recruitment, Payroll, Document Management System (DMS) </p>
                <br>
                <br />
                <a href="hreye-dubai.html">Learn more</a> </div>
            <!-- end section -->
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="feature_section30 two">
        <div class="container">
            <section class="slider nosidearrows">
                <div class="flexslider carousel">
                    <ul class="slides">
                        <li>
                            <div class="one_half"> <br />
                                <h1 class="whitecaps">Understand your Org chart.<br />
                                    <strong>Get better results.</strong></h1>
                                <p class="white">OrgPlus embeds over three dozen commonly used HR views into predefined View Templates. All you need to do is map your data to OrgPlus fields, and you can quickly toggle through organizational views ranging from contact information to salary and diversity analysis.</p>
                                <br />
                                <br />
                                <a href="orgplus-organisation-charting-software-Dubai.html" class="readmore_but10">Learn more</a> </div>
                            <div class="one_half last"><img src="{{asset('/')}}/old/images//desktop.png" alt="ogplus automatic org chart software Dubai" class="img_left" /></div>
                        </li>
                        <!-- end section -->
                        <li>
                            <div class="one_half"> <br />
                                <h1 class="whitecaps">Intelligent Talent Management™ <br />
                                    <strong>Find the leader inside your organization</strong></h1>
                                <p class="white">Saba's cloud-based Intelligent Talent Management solution uses machine learning to improve the way you hire, develop, engage and inspire your people.</p>
                                <br />
                                <br />
                                <a href="saba-talent-management-dubai.html" class="readmore_but10">Learn more</a> </div>
                            <div class="one_half last"><img src="{{asset('/')}}/old/images//desktop-2.png" alt="saba talent and learning management software Dubai" class="img_left" /></div>
                        </li>
                        <!-- end section -->
                        <li>
                            <div class="one_half"> <br />
                                <h1 class="white">odoo <br />
                                    <strong>A powerful ERP Solution</strong></h1>
                                <p class="white">Open source alternative to proprietary ERP management solutions. Designed to streamline, automate and make the processes of day-to-day businesses less of a hassle.</p>
                                <br />
                                <br />
                                <a href="odoo-open-erp-accounting-software-dubai.html" class="readmore_but10">Learn more</a> </div>
                            <div class="one_half last"><img src="{{asset('/')}}/old/images//desktop-3.png" alt="odoo open ERP systems Dubai" class="img_left" /></div>
                        </li>
                        <!-- end section -->
                        <li>
                            <div class="one_half"> <br />
                                <h1 class="white"> <strong>Aver</strong></br>
                                    Video Conferencing Solution</h1>
                                <p class="white">Perfect Video conferencing solution for large rooms in main offices, Aver allows you to connect with up to 10 parties, all in HD. Integrate with other VC systems, mobile and/or desktop solutions with or without cloud service subscriptions.</p>
                                <br />
                                <br />
                                <a href="aver-hd-video-conference-camera-dubai.html" class="readmore_but10">Learn more</a> </div>
                            <div class="one_half last"><img src="{{asset('/')}}/old/images//svc100.png" alt="odoo open ERP systems Dubai" class="img_left" /></div>
                        </li>
                        <!-- end section -->
                    </ul>
                </div>
            </section>
        </div>
    </div>


    <div class="clearfix"></div>
    <div class="fusection3">
        <div class="container">
            <h1 class="animate" data-anim-type="zoomIn">Thousands of happy <strong>Customers!</strong></h1>
        </div>
    </div>



@endsection