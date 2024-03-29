<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Employer;
use App\Models\EmployerPost;
use App\Models\Epin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

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
        session()->forget('job_permit');
        $blogs = Blog::active()->latest()->get();

        return view('front.workshopservices', compact('blogs'));
    }

    public function workshopservice($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        return view('front.workshopservice', compact('blog'));
    }

    public function validate_code(Request $request)
    {
        session()->forget('job_permit');
        $res = Epin::where('serial', $request->code)->first();
        if (!empty($res->used_by)) {
            $blogs = Blog::active()->latest()->get();
            session(['job_permit' => true]);
            return response([
                'success' => true,
                'html_text' => view('front.components.workshopservices_readmore_partial', compact('blogs'))->render()
            ]);
        }
        session(['job_permit' => false]);
        return response([
            'success' => false
        ]);
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

    public function jobpermit_validate(Request $request)
    {
        // return $request->code;
        $code = Epin::where('serial', $request->code)->first();
        if (empty($code)) {
            return back()->with('warning', 'Job Permit Code not found!');
        }
        return view('front.jobpermit', compact('code'));
    }

    public function faq()
    {
        return view('front.faq');
    }

    /*public function agents()
    {
        
        $vendors = User::where('role', 'Vendor')->latest('id')->get();
        return view('front.agents', compact('vendors'));
    }*/
    
    public function agents()
    {
        $vendors = User::where('is_vendor', '1')->whereNotNull('priority')->orderBy('priority')->get();
        return view('front.agents', compact('vendors'));
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

    public function jobsfortoday()
    {
        $jobs = array();
        if (auth()->user()) {
            $employers = Employer::with('latest_job')->active();
            // if (auth()->user()->package_id === 2) {
            //     $employers = $employers->where('package_id', $request->package_id);
            // }
            if (auth()->user()->package_id === 1) {
                $employers = $employers->where('package_id', auth()->user()->package_id)->limit(3);
            }
            $employers = $employers->latest('id')->get();
            foreach ($employers as $item) {
                if (!empty($item->latest_job)) {
                    $jobs[] = $item;
                }
            }
        }
        return view('front.jobsfortoday', compact('jobs'));
    }

    public function jobfortoday($slug)
    {
        if (!Auth::check()) {
            return back()->with('warning', 'You are not authenticated!');
        }
        $blog = EmployerPost::where('slug', $slug)->first();
        return view('front.jobfortoday', compact('blog'));
    }
}
