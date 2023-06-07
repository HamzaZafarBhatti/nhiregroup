<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //

    public function index()
    {
        return view('front.index');
    }

    public function aboutus()
    {
        return view('front.aboutus');
    }

    public function services()
    {
        return view('front.services');
    }

    public function training()
    {
        return view('front.training');
    }

    public function jobs()
    {
        return view('front.jobs');
    }

    public function softskills()
    {
        return view('front.softskills');
    }

    public function person()
    {
        return view('front.person');
    }

    public function staffandservices()
    {
        return view('front.staffandservices');
    }

    public function workshopservices()
    {
        return view('front.workshopservices');
    }

  public function howitworks()
    {
        return view('front.howitworks');
    }

    public function whatweoffer()
    {
        return view('front.whatweoffer');
    }

 public function jobpermit()
    {
        return view('front.jobpermit');
    }

    public function faq()
    {
        return view('front.faq');
    }

   public function agents()
    {
        return view('front.agents');
    }

    public function topearners()
    {
        return view('front.topearners');
    }

    public function privacy()
    {
        return view('front.privacy');
    }

    public function terms()
    {
        return view('front.terms');
    }

    public function disclaimer()
    {
        return view('front.disclaimer');
    }

    public function clientspage()
    {
        return view('front.clientspage');
    }

    public function testimonials()
    {
        return view('front.testimonials');
    }

    public function contactus()
    {
        return view('front.contactus');
    }

    public function aggumentation()
    {
        return view('front.aggumentation');
    }

    public function weoffer()
    {
        return view('front.weoffer');
    }
}
