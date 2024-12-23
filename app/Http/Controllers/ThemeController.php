<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function welcome()
    {
        return view('themes.welcome');
    }
    public function master()
    {
        return view('themes.master');
    }
    public function about()
    {
        return view('themes.about');
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
        return view('themes.service');
    }
    public function team()
    {
        return view('themes.team');
    }
    public function testimonial()
    {
        return view('themes.testimonial');
    }
    public function event()
    {
        return view('themes.event');
    }
    public function program()
    {
        return view('themes.program');
    } 
    public function review()
    {
        return view('themes.review');
    }

    // public function error()
    // {
    //     return view('themes.404');
    // }
}
 