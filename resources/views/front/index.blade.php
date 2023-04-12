@extends('front.layouts.app')

@section('styles')
    <style>
        .btn-hire:hover {
            transform: scale(1.2)
        }
    </style>
@endsection

@section('content')
    <div class="pm-presentation-container pm-parallax-panel" data-stellar-background-ratio="0.5"
        data-stellar-vertical-offset="97" style="background-position: 0% 8.3125px;">
        <div class="pm-presentation-text-container">
            <ul class="pm-presentation-posts" id="pm-presentation-owl" style="opacity: 1; display: block;">
                <li>
                    <div class="pm-presentation-post-container">
                        <div class="pm-presentation-post-title">
                            <p>Staffing Agumentation</p>
                        </div>
                        <div class="pm-presentation-post-excerpt">
                            <p>Contract Placement</p>
                        </div>
                        <div class="pm-presentation-post-hover-container">
                            <!--<p class="pm-presentation-post-hover-title">protected posts</p>-->
                            <p class="pm-presentation-post-hover-excerpt">Staff augmentation is an outsourcing
                                strategy which is used to staff a project and respond.<a href="#">[...]</a>
                            </p>
                            <a href="{{ route('front.aggumentation') }}">Read More »</a>
                        </div>
                        <div class="pm-presentation-post-img">
                            <img src="{{ asset('assets/front/new/images/01_post.jpg') }}" width="475" height="315"
                                alt="post1">
                        </div>
                    </div><!-- /pm-presentation-post-container -->
                </li>
                <li>
                    <div class="pm-presentation-post-container">
                        <div class="pm-presentation-post-title" style="bottom: 70px;">
                            <p>WeHire</p>
                        </div>
                        <div class="pm-presentation-post-excerpt" style="bottom: 36px;">
                            <p>what we offer</p>
                        </div>
                        <div class="pm-presentation-post-hover-container" style="left: 290px;">
                            <!--<p class="pm-presentation-post-hover-title">protected posts</p>-->
                            <p class="pm-presentation-post-hover-excerpt">. Accommodation and stipend
                                provided.<br>
                                . Health insurance and 401(k).<br>
                                . Interview travel and Rental car costs paid.<a href="#">[...]</a>
                            </p>
                            <a href="{{ route('front.weoffer') }}">Read More »</a>
                        </div>

                        <div class="pm-presentation-post-img" style="transform: scale(1, 1);">
                            <img src="{{ asset('assets/front/new/images/02_post.jpg') }}" width="450" height="315"
                                alt="post2">
                        </div>
                    </div><!-- /pm-presentation-post-container -->
                </li>
                <li>
                    <div class="pm-presentation-post-container">
                        <div class="pm-presentation-post-title">
                            <p>T &amp; D Services</p>
                        </div>
                        <div class="pm-presentation-post-excerpt">
                            <p>IT Training</p>
                        </div>
                        <div class="pm-presentation-post-hover-container">
                            <!--<p class="pm-presentation-post-hover-title">protected posts</p>-->
                            <p class="pm-presentation-post-hover-excerpt">With a wealth of experience in IT
                                Training, we offer a range of IT Training services to meet the varied demands of
                                today's competitive marketplace.<a href="#">[...]</a>
                            </p>
                            <a href="{{ route('front.training') }}">Read More »</a>
                        </div>

                        <div class="pm-presentation-post-img">
                            <img src="{{ asset('assets/front/new/images/03_post.jpg') }}" width="450" height="315"
                                alt="post3">
                        </div>
                    </div><!-- /pm-presentation-post-container -->
                </li>
                <li>
                    <div class="pm-presentation-post-container">


                        <div class="pm-presentation-post-title">
                            <p>Placement Partners</p>
                        </div>

                        <div class="pm-presentation-post-excerpt">
                            <p>Placemnets</p>
                        </div>

                        <div class="pm-presentation-post-hover-container">
                            <!--<p class="pm-presentation-post-hover-title">protected posts</p>-->
                            <p class="pm-presentation-post-hover-excerpt">Since 1997, Delta Information Systems
                                has been building dedicated and committed relationships with clients and
                                employees.<a href="#">[...]</a>
                            </p>
                            <a href="{{ route('front.clientspage') }}">Read More »</a>
                        </div>

                        <div class="pm-presentation-post-img">
                            <img src="{{ asset('assets/front/new/images/05_post.jpg') }}" width="475" height="315"
                                alt="post5">
                        </div>
                    </div><!-- /pm-presentation-post-container -->
                </li>
            </ul>
        </div>
    </div>

    <div class="pm-column-container pm-containerPadding60 pm-mobile-center" style="background-color:#283e4e;">

        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-4">

                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-3">
                            <img src="{{ asset('assets/front/new/images/01_service_icon.png') }}" alt="icon1">
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-9">
                            <h4 class="pm-services-panel-title">RPO Services</h4>
                            <p class="pm-services-panel-text2"> Job Analysis <br>
                                Requirements Gathering <br>
                                Candidate Research<br>
                                Candidate Screening<br>
                            </p>
                            <a href="{{ route('front.services') }}">View deatils »</a>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 col-md-4 col-sm-4">

                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-3">
                            <img src="{{ asset('assets/front/new/images/02_service_icon.png') }}" alt="icon2">
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-9">
                            <h4 class="pm-services-panel-title">T&amp;D Services</h4>
                            <p class="pm-services-panel-text2">IT Training<br>
                                On-the job training<br>
                                Soft Skills Training<br>
                                Personality Development Training<br>
                            </p>
                            <a href="{{ route('front.tdservices') }}">View deatils »</a>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 col-md-4 col-sm-4">

                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-3">
                            <img src="{{ asset('assets/front/new/images/1_services-icon.png') }}" alt="icon3">
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-9">
                            <h4 class="pm-services-panel-title">Staffing Services</h4>
                            <p class="pm-services-panel-text2"> Contract Placement<br>
                                Contract-to-Hire Placement<br>
                                Direct Placement<br>
                            </p><br>

                            <a href="{{ route('front.staffing_services') }}">View deatils »</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
    <div class="pm-column-container pm-containerPadding80">
        <div class="container">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6 col-12">
                    <h3 class="pm-center">NHire Salary Structure</h3>
                    <h6 class="pm-center">Calculate Your Take Home Salary</h6>
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="work_category" class="col-lg-3 control-label">Work Category</label>
                            <div class="col-lg-9">
                                <select name="work_category" class="form-control" style="margin-top: 0;">
                                    <option value="">Select Work Category</option>
                                    <option value="part_time">Part Time</option>
                                    <option value="full_time">Full Time</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="currency" class="col-lg-3 control-label">Currency</label>
                            <div class="col-lg-9">
                                <select name="currency" class="form-control" style="margin-top: 0;">
                                    <option value="">Select Currency</option>
                                    <option value="naira">Naira</option>
                                    <option value="usd">USD</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="working_days" class="col-lg-3 control-label">Working Days</label>
                            <div class="col-lg-9">
                                <select name="working_days" class="form-control" style="margin-top: 0;">
                                    <option value="">Select Working Days</option>
                                    <option value="7">7 days</option>
                                    <option value="15">15 days</option>
                                    <option value="30">30 days</option>
                                    <option value="365">365 days</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Calculate Salary</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-3"></div>
            </div>
            <div>
                <a href="#" class="btn btn-danger btn-lg btn-block btn-hire" type="button">
                    GET HIRED!
                </a>
            </div>
        </div>
    </div>

    <div class="pm-column-container pm-containerPadding80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="pm-center">Clients for our company</h3>
                    <ul class="pm-partners-carousel-posts" id="pm-partners-carousel-owl"
                        style="opacity: 1; display: block;">
                        <li>
                            <div class="pm-parnters-post-container">
                                <div class="pm-parnters-post-url">
                                    <a href="http://wehire.us/index.html#">Accenture</a>
                                </div>
                                <img src="{{ asset('assets/front/new/images/01_partner.jpg') }}" class="img-responsive"
                                    alt="Accenture">
                            </div>
                        </li>
                        <li>
                            <div class="pm-parnters-post-container">
                                <div class="pm-parnters-post-url">
                                    <a href="http://wehire.us/index.html#">Action</a>
                                </div>
                                <img src="{{ asset('assets/front/new/images/02_partner.jpg') }}" class="img-responsive"
                                    alt="action">
                            </div>
                        </li>
                        <li>
                            <div class="pm-parnters-post-container">
                                <div class="pm-parnters-post-url">
                                    <a href="http://wehire.us/index.html#">Apigee</a>
                                </div>

                                <img src="{{ asset('assets/front/new/images/03_partner.jpg') }}" class="img-responsive"
                                    alt="Apigee">
                            </div>
                        </li>
                        <li>
                            <div class="pm-parnters-post-container">
                                <div class="pm-parnters-post-url">
                                    <a href="http://wehire.us/index.html#">TD bank</a>
                                </div>

                                <img src="{{ asset('assets/front/new/images/04_partner.jpg') }}" class="img-responsive"
                                    alt="tdbank">
                            </div>
                        </li>
                        <li>
                            <div class="pm-parnters-post-container">
                                <div class="pm-parnters-post-url">
                                    <a href="http://wehire.us/index.html#">Deloitte</a>
                                </div>
                                <img src="{{ asset('assets/front/new/images/05_partner.jpg') }}" class="img-responsive"
                                    alt="deloitte">
                            </div>
                        </li>
                        <li>
                            <div class="pm-parnters-post-container">
                                <div class="pm-parnters-post-url">
                                    <a href="http://wehire.us/index.html#">Fedex</a>
                                </div>
                                <img src="{{ asset('assets/front/new/images/06_partner.jpg') }}" class="img-responsive"
                                    alt="fedex">
                            </div>
                        </li>
                        <li>
                            <div class="pm-parnters-post-container">
                                <div class="pm-parnters-post-url">
                                    <a href="http://wehire.us/index.html#">Intuit</a>
                                </div>
                                <img src="{{ asset('assets/front/new/images/07_partner.jpg') }}" class="img-responsive"
                                    alt="intuit">
                            </div>
                        </li>
                        <li>
                            <div class="pm-parnters-post-container">
                                <div class="pm-parnters-post-url">
                                    <a href="http://wehire.us/index.html#">JpMorganChase</a>
                                </div>
                                <img src="{{ asset('assets/front/new/images/08_partner.jpg') }}" class="img-responsive"
                                    alt="JpMorganChase">
                            </div>
                        </li>
                        <li>
                            <div class="pm-parnters-post-container">
                                <div class="pm-parnters-post-url">
                                    <a href="http://wehire.us/index.html#">P&amp;G</a>
                                </div>
                                <img src="{{ asset('assets/front/new/images/09_partner.jpg') }}" class="img-responsive"
                                    alt="P&amp;G">
                            </div>
                        </li>
                        <li>
                            <div class="pm-parnters-post-container">
                                <div class="pm-parnters-post-url">
                                    <a href="http://wehire.us/index.html#">P&amp;G</a>
                                </div>
                                <img src="{{ asset('assets/front/new/images/10_partner.jpg') }}" class="img-responsive"
                                    alt="peopleAdmin">
                            </div>
                        </li>
                        <li>
                            <div class="pm-parnters-post-container">
                                <div class="pm-parnters-post-url">
                                    <a href="http://wehire.us/index.html#">votigo</a>
                                </div>
                                <img src="{{ asset('assets/front/new/images/11_partner.jpg') }}" class="img-responsive"
                                    alt="votigo">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
