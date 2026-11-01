<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function contact()
    {
        return view('contact');
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
         return view('register');
    }

    public function forgotpassword()
    {
    return view('forgot-password');
    }
     public function resetpassword()
    {
    return view('reset-password');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
       

    }

}