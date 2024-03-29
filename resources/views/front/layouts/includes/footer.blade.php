<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="pm-footer-social-info-container">
                    <h6>Join the conversation</h6>
                    <p>
                        Follow NHIRE on social media for special updates and
                        upcoming events.
                    </p>
                    <ul class="pm-footer-social-icons">
                        <li title="Twitter" class="pm_tip_static_top">
                            <a href="javascript:void(0)"><i class="fa fa-twitter tw"></i></a>
                        </li>
                        <li title="Facebook" class="pm_tip_static_top">
                            <a href="javascript:void(0)"><i class="fa fa-facebook fb"></i></a>
                        </li>
                        <li title="Google Plus" class="pm_tip_static_top">
                            <a href="javascript:void(0)"><i class="fa fa-google-plus gp"></i></a>
                        </li>
                        <li title="Linkedin" class="pm_tip_static_top">
                            <a href="javascript:void(0)"><i class="fa fa-linkedin linked"></i></a>
                        </li>
                        <li title="YouTube" class="pm_tip_static_top">
                            <a href="javascript:void(0)"><i class="fa fa-youtube yt"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="pm-footer-subscribe-container">
                    <h6>Get updated from our newsletter</h6>
                    <p>
                        Sign up for our up-to-date newsletter and stay up to date with NHIRE.
                    </p>
                    <div class="pm-footer-subscribe-form-container">
                        <form action="javascript:void(0)" method="post" id="pm-footer-subscribe">
                            <input class="pm-footer-subscribe-field" type="text" placeholder="Email Address"
                                value="" />
                            <div class="pm-footer-subscribe-submit-btn">
                                <i class="fa fa-paper-plane"></i>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="pm-footer-copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12 pm-footer-copyright-col">
                <p>
                    ©{{ now()->format('Y') }} NHIRE GROUP. All Rights Reserved
                </p>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 pm-footer-navigation-col">
                <ul class="pm-footer-navigation l_tinynav1" id="pm-footer-nav">
                    <li>
                        <a href="{{ route('front.aboutus') }}">About Us</a>
                    </li>
                    <li>
                        <a href="{{ route('front.services') }}">Services</a>
                    </li>
                    <li>
                        <a href="{{ route('front.faq') }}">Technologies</a>
                    </li>
                    <li>
                        <a href="{{ route('front.clientspage') }}">Clients</a>
                    </li>
                    <li>
                        <a href="{{ route('front.testimonials') }}">Testimonials</a>
                    </li>
                    <li>
                        <a href="{{ route('front.contactus') }}">contact us</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
