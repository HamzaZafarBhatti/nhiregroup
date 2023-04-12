<div class="pm-header-info">
    <div class="container pm-header-info-container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <ul class="pm-header-support-ul">
                    <li>
                        <p class="pm-header-support-text">
                            General Inquiries &nbsp;<span>{{ $settings->phone }}</span>&nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        </p>
                    </li>

                    <li>
                        <p class="pm-header-support-text">
                            <img
                                src="{{ asset('assets/front/new/images/Mail-icon.png') }}" />&nbsp;&nbsp;{{ $settings->email }}
                        </p>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="pm-header-buttons-spacer">
                    <ul class="pm-header-buttons-ul">
                        <li>
                            <p class="pm-header-support-text">Employee Login</p>
                        </li>

                        <li>
                            <div class="pm-base-btn pm-header-btn pm-login-btn">
                                <a href="{{ route('user.login') }}">Login</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /pm-header-info -->

<header class="">
    <div class="container pm-header-container">
        <div class="row">
            <div class="col-lg-4 col-md-3 col-sm-12 pm-header-logo-div">
                <div class="pm-header-logo-container">
                    <a href="{{ route('front.index') }}"><img src="{{ asset('assets/front/new/images/logo.jpg') }}"
                            class="img-responsive" alt="wehire" /></a>
                    <a href="{{ route('front.index') }}"><img src="{{ asset('assets/front/new/images/we.png') }}"
                            class="img-responsive" alt="wehire" width="90px" height="90px" /></a>
                </div>
                <div class="pm-header-mobile-btn-container">
                    <button type="button" class="navbar-toggle pm-main-menu-btn" id="pm-main-menu-btn"
                        data-toggle="collapse" data-target=".navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
            </div>

            <div class="col-lg-8 col-md-9 col-sm-12 pm-main-menu">
                <nav class="navbar-collapse collapse">
                    <!-- superfish-->
                    <ul class="sf-menu sf-js-enabled" id="pm-nav">
                        <li class="current">
                            <a href="{{ route('front.index') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('front.aboutus') }}">About Us</a>
                        </li>
                        <li>
                            <a href="{{ route('front.services') }}" class="sf-with-ul">Services<span
                                    class="sf-sub-indicator"> »</span></a>
                            <ul style="display: none">
                                <li>
                                    <a href="{{ route('front.tdservices') }}" class="sf-with-ul">T
                                        &amp; D Services<span class="sf-sub-indicator">
                                            »</span></a>
                                    <ul style="display: none">
                                        <li>
                                            <a href="{{ route('front.training') }}">IT Training</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('front.ojt') }}">On-the job
                                                training</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('front.softskills') }}">Soft Skills
                                                Training</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('front.person') }}">Personality
                                                Development Training</a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="{{ route('front.staffing_services') }}">Staffing
                                        Services</a>
                                </li>

                                <li>
                                    <a href="{{ route('front.rpo_services') }}">RPO Services</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="sf-with-ul">Technologies<span
                                    class="sf-sub-indicator"> »</span></a>
                            <ul style="display: none">
                                <li>
                                    <a href="{{ route('front.microsoftmsb') }}">Microsoft
                                        Technologies</a>
                                </li>
                                <li>
                                    <a href="{{ route('front.sapsoft') }}">SAP &amp; Peoplesoft</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Testing Modules</a>
                                </li>
                                <li>
                                    <a href="{{ route('front.technologies') }}">Oracle, Big data
                                        &amp; Hadoop</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Java,.Net &amp;
                                        Open
                                        Technologies</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('front.clientspage') }}">Clients</a>
                        </li>
                        <li>
                            <a href="{{ route('front.testimonials') }}">Testimonials</a>
                        </li>
                        <li>
                            <a href="{{ route('front.contactus') }}">Contact Us</a>
                        </li>
                    </ul>
                    <!-- /superfish -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- /header -->
