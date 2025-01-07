<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Event;

use Illuminate\Http\Request;

class ThemeController extends Controller
{

    public function welcome()
    {
        return view('themes.welcome');
    }
    public function master()
    {
        $events = Event::all();
        $pro = Program::all();
        return view('themes.master', compact('pro', 'events'));
        
        // return view('themes.master');
    }
    public function about()
    {
        $pageTitle='about Us';

        return view('themes.about',compact('pageTitle'));
    }
    public function blog()
    {
        return view('themes.blog');
    }
    public function contact()
    {
        return view('themes.contact');
    }
    public function service()
    {
        $pageTitle='service';
        return view('themes.service',compact('pageTitle'));
    }
    public function team()
    {
        $pageTitle='team';

        return view('themes.team',compact('pageTitle'));
    }
    public function testimonial()
    {
        $pageTitle='testimonial';

        return view('themes.testimonial',compact('pageTitle'));
    }
    public function event()
    {
        return view('themes.event');
    }
    // public function program()
    // {
    //     return view('themes.program');
    // } 
    public function review()
    {
        return view('themes.review');
    }

    public function loginTheme()
    {
        return view('themes.loginTheme');
    }
    
    public function registerTheme()
    {
        return view('themes.registerTheme');
    }
}
 