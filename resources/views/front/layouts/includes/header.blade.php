<div class="pm-header-info">
    <div class="container pm-header-info-container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="pm-header-buttons-spacer">
                    <ul class="pm-header-buttons-ul">
                        <li>
                            <p class="pm-header-support-text">Employee Account </p>
                        </li>

                        <li>
                            <div class="pm-base-btn pm-header-btn pm-login-btn">
                                <a href="{{ route('user.login') }}">Login</a>
                            </div>
                        </li>
                        <li>
                            <div class="pm-base-btn pm-header-btn pm-login-btn">
                                <a href="{{ route('user.register') }}">Register</a>
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
                    <a href="{{ route('front.index') }}"><img src="{{ asset('assets/front/new/images/nhirelogo.png') }}"
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
                            <a href="{{ route('front.services') }}" class="sf-with-ul">SERVICES<span
                                    class="sf-sub-indicator"> »</span></a>
                            <ul style="display: none">
                                 <li>
                                    <a href="https://nhiregroup.com/howitworks">HOW IT WORKS </a>
                                </li>

                                <li>
                                    <a href="https://nhiregroup.com/agents">AGENTS</a>
                                </li>

                                <li>
                                    <a href="{{ route('front.jobpermit') }}">AUTHENTICATE JOB PERMIT</a>
                                </li>
                                <li>
                                    <a href="{{ route('front.workshopservices') }}">NHIRE Workshop</a>
                                </li>
                                <li>
                                    <a href="{{ route('front.whatweoffer') }}">WHAT WE OFFER</a>
                                </li>
                                <li>
                                    <a href="{{ route('front.staffandservices') }}">STAFF AND SERVICES</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="sf-with-ul">PAGES<span
                                    class="sf-sub-indicator"> »</span></a>
                            <ul style="display: none">
                                <li>
                                    <a href="{{ route('front.faq') }}">FAQ</a>
                                </li>
                                <li>
                                    <a href="{{ route('front.topearners') }}">TOP SALARY EARNERS</a>
                                </li>
                                <li>
                                    <a href="https://nhiregroup.com/privacy">PRIVACY POLICY</a>
                                </li>
                                <li>
                                    <a href="{{ route('front.terms') }}">TERMS OF SERVICE</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li>
                            <a href="https://nhiregroup.com/jobs">JOBS POSITIONS</a>
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
