<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
 feature/contact-page


    /**
     * Display a listing of the resource.
     */

 develop
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
 feature/contact-page
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
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

 develop
    }

    public function register()
    {
        return view('register');
    }

    public function forgotpassword()
    {
        return view('forgotpassword');
    }

 feature/contact-page
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}

}
 develop
