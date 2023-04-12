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

    public function ojt()
    {
        return view('front.ojt');
    }

    public function softskills()
    {
        return view('front.softskills');
    }

    public function person()
    {
        return view('front.person');
    }

    public function staffing_services()
    {
        return view('front.staffing_services');
    }

    public function rpo_services()
    {
        return view('front.rpo_services');
    }

    public function microsoftmsb()
    {
        return view('front.microsoftmsb');
    }

    public function sapsoft()
    {
        return view('front.sapsoft');
    }

    public function technologies()
    {
        return view('front.technologies');
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
