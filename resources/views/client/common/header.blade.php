<header id="header">
    <div id="trueHeader">
        <div class="wrapper">
            <div class="logoarea">
                <div class="container">
                    <!-- Logo -->
                    <div class="logo"><a href="{{url('/')}}" id="logo"></a></div>
                    <div class="right_links">
                        <ul>
                            <li class="link"><i class="fa fa-phone"></i> +971 4 326 3939</li>
                            <li class="link"><a href="mailto:info@epillars.com"> info@epillars.com</a></li>
                            <li class="social"><a href="https://www.facebook.com/epillars.dubai" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li class="social"><a href="https://twitter.com/ePillars_System" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li class="social"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li class="social"><a href="https://www.linkedin.com/company/epillars-systems-llc" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <!-- end right links -->
                </div>
            </div>
            <!-- Menu Bar-->
            <!-- Menu Bar-->
            <div class="menu_main">
                <div class="container">
                    <div class="navbar yamm navbar-default">
                        <div class="container">
                            <div class="navbar-header">
                                <div class="navbar-toggle .navbar-collapse .pull-right " data-toggle="collapse" data-target="#navbar-collapse-1"  > <span>Menu</span>
                                    <button type="button" > <i class="fa fa-bars"></i></button>
                                </div>
                            </div>
                            <div id="navbar-collapse-1" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    @widget('MainMenu', ['menu_position' => 'Header'])
                                    <li><a href="{{url('/')}}" class="active">Home</a></li>
                                    <li class="dropdown">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Software Solutions</a>
                                        <ul class="dropdown-menu multilevel" role="menu">
                                            <li class="dropdown-submenu mul">
                                                <a tabindex="-1" href="{{url('/')}}/saba-talent-management-dubai">Intelligent Talent Management</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{url('/')}}/saba-talent-management-dubai"><img src="{{asset('old')}}/images/saba.png" align="middle"></a></li>
                                                </ul>
                                            <li class="dropdown-submenu mul">
                                                <a tabindex="-1" href="{{url('/')}}/saba-learning-management-dubai">Learning Management</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{url('/')}}/saba-learning-management-dubai"><img src="{{asset('old')}}/images/saba.png" align="middle"></a></li>
                                                </ul>
                                            <li class="dropdown-submenu mul">
                                                <a tabindex="-1" href="#" target="_blank">HCM & HR systems</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{url('/')}}/hreye-dubai"><img src="{{asset('old')}}/images/hreye-log.png" align="middle"></a></li>
                                                    <li><a href="{{url('/')}}/sap-successfactors-dubai"><img src="{{asset('old')}}/images/successfactors-log.png" align="middle"></a></li>
                                                </ul>
                                            <li> <a tabindex="-1" href="saba-hr-data-visualization-dubai">HR Data Visualization</a></li>
                                            <li class="dropdown-submenu mul">
                                                <a tabindex="-1" href="erp-systems-dubai">ERP Solutions</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{url('/')}}/sap-erp-dubai"><img src="{{asset('old')}}/images/sap-logo-menu.png" align="middle"></a></li>
                                                    <li><a href="{{url('/')}}/odoo-open-erp-accounting-software-dubai"><img src="{{asset('old')}}/images/odoo.png" align="middle"></a></li>
                                                    <li><a href="{{url('/')}}/erp-at-work-dubai"><img src="{{asset('old')}}/images/erp at work nav logo.png" align="middle"></a></li>
                                                    <li><a href="{{url('/')}}/zoho-one-dubai"><img src="{{asset('old')}}/images/zoho nav logo.png" align="middle"></a></li>
                                                </ul>
                                            <li class="dropdown-submenu mul">
                                                <a tabindex="-1" href="org-charting-solutions-dubai">Automated Org Charting</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{url('/')}}/orgplus-organisation-charting-software-Dubai"><img src="{{asset('old')}}/images/orgplus.png" align="middle"></a></li>
                                                    <li><a href="{{url('/')}}/orgplus-organisation-charting-software-Dubai"><img src="{{asset('old')}}/images/orgplus nav logo.png" align="middle"></a></li>
                                                    <li><a href="{{url('/')}}/orgmanager-organisation-charting-software-Dubai"><img src="{{asset('old')}}/images/orgmanager.png" align="middle"></a></li>
                                                    <li><a href="{{url('/')}}/orgplus-organisation-charting-software-Dubai"><img src="{{asset('old')}}/images/planing nav logo.png" align="middle"></a></li>
                                                </ul>
                                            <li class="dropdown-submenu mul">
                                                <a tabindex="-1" href="facility-management-software-dubai-uae">Facility Management</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{url('/')}}/idrawings-dubai"><img src="{{asset('old')}}/images/idrawings nav logo dubai.png" align="middle"></a></li>
                                                    <li><a href="{{url('/')}}/idrawings-dubai"><img src="{{asset('old')}}/images/vlogic-cafm.png" align="middle"></a></li>
                                                </ul>
                                            <li class="dropdown-submenu mul">
                                                <a tabindex="-1" href="video-conferencing-dubai">Cloud conferencing system</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{url('/')}}/webex-dubai"><img src="{{asset('old')}}/images/webex nav logo.png" align="middle"></a></li>
                                                </ul>
                                            <li class="dropdown-submenu mul">
                                                <a tabindex="-1" href="digital-signature-dubai-uae">Digital Signature solutions</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{url('/')}}/docusign-dubai"><img src="{{asset('old')}}/images/docu sign dubai nav logo.png" align="middle"></a></li>
                                                    <li><a href="{{url('/')}}/globalsign-dubai"><img src="{{asset('old')}}/images/globalsign dubai nav logo.png" align="middle"></a></li>
                                                    <li><a href="{{url('/')}}/zoho-sign"><img src="{{asset('old')}}/images/zoho-logo.png" align="middle"></a></li>
                                                </ul>
                                            <li class="dropdown-submenu mul">
                                                <a tabindex="-1" href="{{url('/')}}/digital-certificates-dubai-uae">Digital SSL Certificates</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{url('/')}}/digicert-digital-certificates-dubai"><img src="{{asset('old')}}/images/digicert dubai nav logo.png" align="middle"></a></li>
                                                    <li><a href="{{url('/')}}/globalsign-certificate-dubai"><img src="{{asset('old')}}/images/globalsign dubai nav logo.png" align="middle"></a></li>
                                                </ul>
                                            <li class="dropdown-submenu mul">
                                                <a tabindex="-1" href="{{url('/')}}/integrated-messaging-swift-services-dubai">Integrated Messaging Services</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{url('/')}}/integrated-messaging-swift-services-dubai"><img src="{{asset('old')}}/images/ecs-logo.png" align="middle"></a></li>
                                                </ul>
                                            <li class="dropdown-submenu mul">
                                                <a tabindex="-1" href="#">SaaS (Office Software)</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{url('/')}}/google-apps-dubai">Google Apps</a></li>
                                                    <li><a href="{{url('/')}}/office-365-dubai">Office 365</a></li>
                                                </ul>
                                            <li> <a tabindex="-1" href="#">Call Center Solutions</a></li>
                                        </ul>
                                    </li>
                                    </li>
                                    </li>
                                    <li class="dropdown yamm-fw">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Products</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="yamm-content">
                                                    <div class="row">
                                                        <ul class="col-sm-6 col-md-3 list-unstyled ">
                                                            <li>
                                                                <p>You are at the right place</p>
                                                            </li>
                                                            <li> <img src="{{asset('old')}}/images/mmenu-pic3.jpg" alt="" class="img_left4">ePillars presents solutions and products based on new technologies (which we call Pillars) which will immensely benefit the enterprises and also provide high level of Return on Investment (RoI).<br/>
                                                                We invite you to select from an array of affordable IT Solutions tailored to streamline your business
                                                            </li>
                                                            <br/>
                                                            <br/>
                                                            <br/>
                                                        </ul>
                                                        <ul class="col-sm-6 col-md-3 list-unstyled ">
                                                            <li>
                                                                <p>IT Infrastructure</p>
                                                            </li>
                                                            <li><a href="{{url('/')}}/asterisk-elastix-ippbx-ip-phone-dubai"><i class="fa fa-angle-right"></i> IP PBX and IP Telephony</a></li>
                                                            <li><a href="{{url('/')}}/asterisk-elastix-ippbx-ip-phone-dubai"><i class="fa fa-angle-right"></i> Unified Communication</a></li>
                                                            <li><a href="{{url('/')}}/airtight-high-range-office-wifi-networking-Dubai"><i class="fa fa-angle-right"></i> Enterprise WiFi Networking</a></li>
                                                            <li><a href="{{url('/')}}/server-virtualization-vmware-citrix-openstack-dubai"><i class="fa fa-angle-right"></i> Virtualization﻿﻿</a></li>
                                                        </ul>
                                                        <ul class="col-sm-6 col-md-3 list-unstyled ">
                                                            <li>
                                                                <p>Information Security</p>
                                                            </li>
                                                            <li> <a href="{{url('/')}}/digicert-digital-certificates-dubai"><i class="fa fa-angle-right"></i> Digital Certificates</a> </li>
                                                            <li> <a href="{{url('/')}}/cyberoam-security-firewall-dubai"><i class="fa fa-angle-right"></i> Firewalls</a> </li>
                                                            <br/>
                                                            <br/>
                                                        </ul>
                                                        <ul class="col-sm-6 col-md-3 list-unstyled ">
                                                            <li>
                                                                <p>Cloud Computing</p>
                                                            </li>
                                                            <li><a href="#"><i class="fa fa-angle-right"></i> Amazon Web Services (AWS)</a></li>
                                                            <br/>
                                                            <br/>
                                                            <br/>
                                                            <br/>
                                                            <br/>
                                                        </ul>
                                                        <ul class="col-sm-6 col-md-3 list-unstyled ">
                                                            <li>
                                                                <p>HD Video Conferencing</p>
                                                            </li>
                                                            <li><a href="{{url('/')}}/aver-hd-video-conference-camera-dubai"> HD Video Communication </a></li>
                                                            <li> <a href=" "> Cloud Conferencing System </a></li>
                                                            <li><a href="{{url('/')}}/aver-hd-video-conference-camera-dubai"><i class="fa fa-angle-right"></i> WebEx, Skype for Business</a></li>
                                                            <li><a href="{{url('/')}}/aver-hd-video-conference-camera-dubai"><i class="fa fa-angle-right"></i> USB Conference Cameras</a></li>
                                                            <li></li>
                                                            <li></li>
                                                        </ul>
                                                        <ul class="col-sm-6 col-md-3 list-unstyled ">
                                                        </ul>
                                                        <!-- <ul class="col-sm-6 col-md-3 list-unstyled ">
                                                           <li>
                                                             <p>Home/Office Automation</p>
                                                           </li>
                                                           <li><a href="control4-smart-home-automation-dubai"><i class="fa fa-angle-right"></i> Home Automation</a></li>
                                                           <li><a href="control4-smart-home-automation-dubai"><i class="fa fa-angle-right"></i> Business Automation</a></li>
                                                           <li><a href="control4-smart-home-automation-dubai"><i class="fa fa-angle-right"></i> Smart Conference Room</a></li>
                                                           <br/>



                                                           </ul> -->
                                                        <ul class="col-sm-6 col-md-3 list-unstyled ">
                                                            <li>
                                                                <p>Business Systems</p>
                                                            </li>
                                                            <li><a href="{{url('/')}}/BizEngine-complete-business-solution"><i class="fa fa-angle-right"></i> BizEngine</a></li>
                                                            <li><a href="{{url('/')}}/erpbox-erp-with-server-dubai" target="_blank"><i class="fa fa-angle-right"></i> ERP Box</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div style="padding-top: 10px; padding-bottom: 20px; padding-left: 15px; background-color: white;"> <img src="{{asset('old')}}/images/asterisks-logo-small.png" style="margin-right: 20px "> <img src="{{asset('old')}}/images/aver-logo-small.png" style="margin-right: 20px "> <img src="{{asset('old')}}/images/control4-logo-small.png" style="margin-right: 20px "> <img src="{{asset('old')}}/images/orgmanager-logo-small.png" style="margin-right: 20px "> <img src="{{asset('old')}}/images/airtight-logo-small.png" style="margin-right: 20px "> <img src="{{asset('old')}}/images/cyberoam-logo-small.png" style="margin-right: 20px "> <img src="{{asset('old')}}/images/elastix-logo-small.png" style="margin-right: 20px "> <img src="{{asset('old')}}/images/digicert-logo-small.png"> </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle">Brochures</a>
                                        <ul class="dropdown-menu multilevel" role="menu">
                                            <li><a href="{{url('/')}}/brochure-download.php?brchr=profile" target="">ePillars Company Profile</a></li>
                                            <li><a href="{{url('/')}}/brochure-download.php?brchr=webex" target="">Webex</a></li>
                                            <li><a href="{{url('/')}}/brochure-download.php?brchr=idraw" target="">iDrawings</a></li>
                                            <li class="dropdown-submenu mul">
                                                <a tabindex="-1">Saba Talent Management</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{url('/')}}/brochure-download.php?brchr=saba" target="">Talent Managment Brochure (Saba)</a></li>
                                                    <li><a href="{{url('/')}}/brochure-download.php?brchr=sabawhite" target="">White Paper (Saba)</a></li>
                                                </ul>
                                            <li class="dropdown-submenu mul">
                                                <a tabindex="-1">Organization Charting</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{url('/')}}/brochure-download.php?brchr=orgplus">OrgPlus - Brochure</a></li>
                                                    <li><a href="{{url('/')}}/brochure-download.php?brchr=orgman">org.manager - Brochure</a></li>
                                                </ul>
                                            <li class="dropdown-submenu mul">
                                                <a tabindex="-1">odoo  </a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{url('/')}}/brochure-download.php?brchr=odoo">Brochure</a></li>
                                                </ul>
                                            <li class="dropdown-submenu mul">
                                                <a tabindex="-1" >Aver Video Conferencing</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{url('/')}}/brochure-download.php?brchr=aver" target="">Brochure</a></li>
                                                    <li><a href="{{url('/')}}/brochure-download.php?brchr=averfeature" target="">Features Brochure</a></li>
                                                </ul>
                                        </ul>
                                    <li class="dropdown yamm-fw">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Partners</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="yamm-content">
                                                    <div class="row">
                                                        <ul class="col-sm-6 col-md-3 list-unstyled ">
                                                            <li>
                                                                <p>Our Partners</p>
                                                            </li>
                                                            <li> <img src="{{asset('old')}}/images/partner-pic.jpg" alt="" class="img_left4"> We are privileged to be associated with major innovators in the field of Information Technology for the past eight years.</li>
                                                            <li><br/></li>
                                                            <li><br/></li>
                                                            <li><br/></li>
                                                            <li><br/></li>
                                                            <li><br/></li>
                                                            <li><br/></li>
                                                            <li><br/></li>
                                                            <li><br/></li>
                                                        </ul>
                                                        <ul class="col-sm-6 col-md-3 list-unstyled ">
                                                            <img src="{{asset('old')}}/images/partner1.jpg" alt="" class="img_left4"> <img src="{{asset('old')}}/images/partner2.jpg" alt="" class="img_left4"> <img src="{{asset('old')}}/images/partner3.jpg" alt="" class="img_left4"> <img src="{{asset('old')}}/images/partner4.jpg" alt="" class="img_left4"> <img src="{{asset('old')}}/images/partner5.jpg" alt="" class="img_left4"> <img src="{{asset('old')}}/images/partner6.jpg" alt="" class="img_left4"> <img src="{{asset('old')}}/images/partner222.jpg" alt="" class="img_left4">
                                                        </ul>
                                                        <ul class="col-sm-6 col-md-3 list-unstyled ">
                                                            <img src="{{asset('old')}}/images/partner7.jpg" alt="" class="img_left4"> <img src="{{asset('old')}}/images/partner8.jpg" alt="" class="img_left4"> <img src="{{asset('old')}}/images/partner10.jpg" alt="" class="img_left4"> <img src="{{asset('old')}}/images/partner11.jpg" alt="" class="img_left4"> <img src="{{asset('old')}}/images/partner12.jpg" alt="" class="img_left4"> <img src="{{asset('old')}}/images/partner20.jpg" alt="" class="img_left4">
                                                        </ul>
                                                        <ul class="col-sm-6 col-md-3 list-unstyled ">
                                                            <img src="{{asset('old')}}/images/partner21.jpg" alt="" class="img_left4"> <img src="{{asset('old')}}/images/partner14.jpg" alt="" class="img_left4"> <img src="{{asset('old')}}/images/partner15.jpg" alt="" class="img_left4"> <img src="{{asset('old')}}/images/partner17.jpg" alt="" class="img_left4"> <img src="{{asset('old')}}/images/partner13.jpg" alt="" class="img_left4"><img src="{{asset('old')}}/images/partner23.jpg" alt="" class="img_left4">
                                                        </ul>
                                                        <ul class="col-sm-6 col-md-3 list-unstyled ">
                                                            <img src="{{asset('old')}}/images/partner24.jpg" alt="" class="img_left4">
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    </li>
                                    </li>
                                    <li class="dropdown"> <a href="{{url('/')}}/training">Training</a></li>
                                    <li class="dropdown"> <a href="{{url('/')}}/testimonials-dubai">Testimonials</a></li>
                                    {{--<li class="dropdown"> <a href="{{url('/')}}/news-updates-dubai">News </a></li>--}}
                                    {{--<li class="dropdown"> <a href="{{url('/')}}/request-demo">Click for a  Demo</a></li>--}}
                                    {{--<li class="dropdown"> <a href="{{url('/')}}/contact">Contact</a></li>--}}
                                </ul>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div> </div>
                </div>
                <!-- end menu -->
            </div>
        </div>
    </div>
</header>