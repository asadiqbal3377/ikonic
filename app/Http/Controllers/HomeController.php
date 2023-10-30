<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        if (auth()->check()) {
            // Check the user's type
            if (auth()->user()->type === 'admin') {
                return redirect('/admin/dashboard'); // Redirect admin to the admin dashboard
            } else {
                return view('welcome'); // Redirect non-admin users to the welcome page
            }
        } else {
            return redirect('/login');
        }
    }

    public function home()
    {
        if (auth()->check()) {
            // Check the user's type
            if (auth()->user()->type === 'admin') {
                return view('home'); 
            } else {
                return view('home'); 
            }
        } else {
            return redirect('/login');
        }
    }
}
