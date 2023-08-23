<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Faq;
use App\Models\Journal;
use App\Models\Profile;
use App\Models\Service;
use App\Models\ServiceType;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $profile = Profile::first();
        $blogs = Journal::latest()->get();
        $testimonials = Testimonial::whereStatus(1)->latest()->limit(3)->get();
        $popularServices = ServiceType::whereStatus(1)->whereNotNull('parent_id')->latest()->limit(9)->get();
        $popularDestinations = Destination::whereStatus(1)->latest()->limit(5)->get();
        $mainServices = ServiceType::whereStatus(1)->whereNull('parent_id')->get();
        $menuServiceTypes = ServiceType::whereStatus(1)->whereNull('parent_id')->get();
        return view('frontend.pages.index',compact('profile','menuServiceTypes','blogs','popularServices','popularDestinations','testimonials','mainServices','profile'));
    }

    public function services($id=1)
    {
        $profile = Profile::first();
        $serviceType = ServiceType::find($id);
        $menuServiceTypes = ServiceType::whereStatus(1)->whereNull('parent_id')->get();
        return view('frontend.pages.services',compact('serviceType','menuServiceTypes','id','profile'));
    }

    public function destinations($id=1)
    {
        $profile = Profile::first();
        $menuServiceTypes = ServiceType::whereStatus(1)->whereNull('parent_id')->get();
        $destinations = Destination::whereStatus(1)->get();
        
        return view('frontend.pages.destinations',compact('id','profile','menuServiceTypes','destinations'));
    }

    public function destination($id)
    {
        $destination = Destination::find($id);
        $profile = Profile::first();
        $menuServiceTypes = ServiceType::whereStatus(1)->whereNull('parent_id')->get();
        $services = Service::whereStatus(1)->where('destination_id',$id)->get();
        return view('frontend.pages.destination-details',compact('profile','menuServiceTypes','destination','services'));
    }

    

    public function service($id)
    {
        $profile = Profile::first();
        $service = Service::find($id);
        $menuServiceTypes = ServiceType::whereStatus(1)->whereNull('parent_id')->get();
        return view('frontend.pages.service',compact('service','menuServiceTypes','id','profile'));
    
    }

    public function faq()
    {
        $faqs = Faq::all();
        $profile = Profile::first();
        $menuServiceTypes = ServiceType::whereStatus(1)->whereNull('parent_id')->get();
        return view('frontend.pages.faq',compact('profile','menuServiceTypes','faqs'));
    }

    public function blogs()
    {
        $profile = Profile::first();
        $menuServiceTypes = ServiceType::whereStatus(1)->whereNull('parent_id')->get();
        return view('frontend.pages.faq',compact('profile','menuServiceTypes'));
    }

    public function testimonials()
    {
        $testimonials = Testimonial::whereStatus(1)->get();
        $profile = Profile::first();
        $menuServiceTypes = ServiceType::whereStatus(1)->whereNull('parent_id')->get();
        return view('frontend.pages.testimonials',compact('profile','menuServiceTypes','testimonials'));
    }

    public function blog($id)
    {
        $blog = Journal::find($id);
        $relatedPosts = Journal::limit(4)->get();
        $profile = Profile::first();
        $menuServiceTypes = ServiceType::whereStatus(1)->whereNull('parent_id')->get();
        return view('frontend.pages.blog-details',compact('profile','menuServiceTypes','blog','relatedPosts'));
    }

    public function about()
    {
        $profile = Profile::first();
        $menuServiceTypes = ServiceType::whereStatus(1)->whereNull('parent_id')->get();
        return view('frontend.pages.about',compact('profile','menuServiceTypes'));
    }

    public function terms()
    {
        $profile = Profile::first();
        $menuServiceTypes = ServiceType::whereStatus(1)->whereNull('parent_id')->get();
        return view('frontend.pages.terms',compact('profile','menuServiceTypes'));
    }

    public function privacyPolicy()
    {
        $profile = Profile::first();
        $menuServiceTypes = ServiceType::whereStatus(1)->whereNull('parent_id')->get();
        return view('frontend.pages.privacy',compact('profile','menuServiceTypes'));
    }

    public function contact()
    {
        $profile = Profile::first();
        $menuServiceTypes = ServiceType::whereStatus(1)->whereNull('parent_id')->get();
        return view('frontend.pages.contact',compact('profile','menuServiceTypes'));
    }

}
