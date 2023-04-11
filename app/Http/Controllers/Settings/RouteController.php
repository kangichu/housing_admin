<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Redirect;

class RouteController extends Controller
{
    public function guard()
    { 

        if(Auth::check())
        { 
            return Redirect::to('home');
        }

        return view('auth.login');
    }
}
