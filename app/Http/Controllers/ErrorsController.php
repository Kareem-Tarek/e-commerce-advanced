<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorsController extends Controller
{
    public function index()
    {
        return view('errors.template-customized-error.website.404');
    }
}
