<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('public.pages.index');
    }

    public function properties()
    {
        return view('public.pages.properties');
    }

    public function reservations()
    {
        return view('public.pages.reservations');
    }

    public function add_property()
    {
        return view('public.pages.add_property');
    }
    public function add_room()
    {
        return view('public.pages.add_room');
    }
    public function booking()
    {
        return view('public.pages.booking');
    }
    public function channels()
    {
        return view('public.pages.channels');
    }
    public function connect_channel()
    {
        return view('public.pages.connect_channel');
    }
    public function rates()
    {
        return view('public.pages.rates');
    }
    public function reports()
    {
        return view('public.pages.reports');
    }
    public function settings()
    {
        return view('public.pages.settings');
    }
    public function rooms()
    {
        return view('public.pages.rooms');
    }


}