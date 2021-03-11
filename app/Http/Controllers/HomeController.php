<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // if (Auth::user() &&  Auth::user()->role == 1) {
        //      auth()->user()->assignRole('Admin');
 
        //  }
        //  else {
        //      auth()->user()->assignRole('Default');
        //  }        
         return view('home');
    }
}
