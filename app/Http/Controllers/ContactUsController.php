<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(){
        return view('dashboard.contact_us.index');
    }

    public function create(){
        return view('layouts.website.contact-us');
    }

    public function store(){
        //
    }

    public function destory(){
        //
    }
}
