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
                            <p>JOBS</p>
                        </div>
                        <div class="pm-presentation-post-excerpt">
                            <p>Open Positions</p>
                        </div>
                        <div class="pm-presentation-post-hover-container">
                            <!--<p class="pm-presentation-post-hover-title">protected posts</p>-->
                            <p class="pm-presentation-post-hover-excerpt">
Become one of our employees in our ever-expanding platform. You'll be receiving your salary regularly, every month and time.
                            </p>
                            <a href="https://nhiregroup.com/jobs">Jobs/ Open Positions »</a>
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
                            <p>NHIRE</p>
                        </div>
                        <div class="pm-presentation-post-excerpt" style="bottom: 36px;">
                            <p>What We Do</p>
                        </div>
                        <div class="pm-presentation-post-hover-container" style="left: 290px;">
                            <!--<p class="pm-presentation-post-hover-title">protected posts</p>-->
                            <p class="pm-presentation-post-hover-excerpt">We're geared up to carve out a place of WORK for you, amidst our different ways of earning. Get HIRED with us Today!
                            </p>
                            <a href="https://nhiregroup.com/aboutus">Learn More »</a>
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
                            <p>Queries/Solutions</p>
                        </div>
                        <div class="pm-presentation-post-excerpt">
                            <p>FAQ</p>
                        </div>
                        <div class="pm-presentation-post-hover-container">
                            <!--<p class="pm-presentation-post-hover-title">protected posts</p>-->
                            <p class="pm-presentation-post-hover-excerpt">We welcome all your general inquiries and would ensure your support issues are quickly with us at NHIRE!
                            </p>
                            <a href="https://nhiregroup.com/contactus">Contact Us »</a>
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
                            <p>CLICK HERE TO GET HIRED!</p>
                            <p>₦120,000/ Month (SALARY)</p>
                        </div>

                        <div class="pm-presentation-post-excerpt">
                            <p>GET HIRED!</p>
                        </div>

                        <div class="pm-presentation-post-hover-container">
                            <!--<p class="pm-presentation-post-hover-title">protected posts</p>-->
                            <p class="pm-presentation-post-hover-excerpt">We are geared up to carve out a place of WORK for you, to enable you to leverage opportunities presented by top-tier companies globally with us. Get HIRED Today!
                            </p>
                            <a href="https://nhiregroup.com/user/register">GET HIRED! »</a>
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
                            <h4 class="pm-services-panel-title">WHAT WE OFFER</h4>
                            <p class="pm-services-panel-text2"> Virtual Workshop Training <br>
                                Instantaneous Job Permits <br>
                                Unlimited Job Offers<br>
                                Safest Money-Making platform<br>
                                Payouts by Bank Transfer, Tether USDT withdrawal, Cheque, and PayPal.<br>
                            </p>
                            <a href="{{ route('front.whatweoffer') }}">View deatils »</a>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 col-md-4 col-sm-4">

                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-3">
                            <img src="{{ asset('assets/front/new/images/02_service_icon.png') }}" alt="icon2">
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-9">
                            <h4 class="pm-services-panel-title">WORKSHOP SERVICES</h4>
                            <p class="pm-services-panel-text2">IT Training<br>
                                On-the job training<br>
                                Soft Skills Training<br>
                                Personality Development Training<br>
                            </p>
                            <a href="{{ route('front.workshopservices') }}">View deatils »</a>
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

                            <a href="{{ route('front.staffandservices') }}">View deatils »</a>
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
                <a href="https://nhiregroup.com/user/register" class="btn btn-danger btn-lg btn-block btn-hire" type="button">
                    CLICK HERE TO GET HIRED!
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
                                    <a href="http://nhiregroup.com/#">Olist</a>
                                </div>
                                <img src="https://nhiregroup.com/assets/front/images/clients/olist233.jpeg" class="img-responsive"
                                    alt="Accenture">
                            </div>
                        </li>
                        <li>
                            <div class="pm-parnters-post-container">
                                <div class="pm-parnters-post-url">
                                    <a href="http://nhiregroup.com/#">Aliexpress</a>
                                </div>
                                <img src="https://nhiregroup.com/assets/front/images/clients/aliexpress.jpeg" class="img-responsive"
                                    alt="action">
                            </div>
                        </li>
                        <li>
                            <div class="pm-parnters-post-container">
                                <div class="pm-parnters-post-url">
                                    <a href="http://nhiregroup.com/#">Jarir</a>
                                </div>

                                <img src="https://nhiregroup.com/assets/front/images/clients/jarir.jpeg" class="img-responsive"
                                    alt="Apigee">
                            </div>
                        </li>
                        <li>
                            <div class="pm-parnters-post-container">
                                <div class="pm-parnters-post-url">
                                    <a href="http://nhiregroup.com/#">Amazon</a>
                                </div>

                                <img src="https://nhiregroup.com/assets/front/images/clients/amazon.jpeg" class="img-responsive"
                                    alt="tdbank">
                            </div>
                        </li>
                        <li>
                            <div class="pm-parnters-post-container">
                                <div class="pm-parnters-post-url">
                                    <a href="http://nhiregroup.com/#">Alibaba</a>
                                </div>
                                <img src="https://nhiregroup.com/assets/front/images/clients/alibaba.jpeg" class="img-responsive"
                                    alt="deloitte">
                            </div>
                        </li>
                        <li>
                            <div class="pm-parnters-post-container">
                                <div class="pm-parnters-post-url">
                                    <a href="http://nhiregroup.com/#">Jumia</a>
                                </div>
                                <img src="https://nhiregroup.com/assets/front/images/clients/jumia.jpeg" class="img-responsive"
                                    alt="fedex">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
