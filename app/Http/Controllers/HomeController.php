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
 


 develop
    }

    public function register()
    {
        return view('register');
    }
 feature/contact-page
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //


    }
 

    

 
 
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



   


    public function forgotpassword()
    {
        return view('forgotpassword');
    }

}
 develop
