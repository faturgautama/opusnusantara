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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('home');
        if(\Auth::user()->hasRole('admin')){
            return redirect('/admin');
        }

        if(\Auth::user()->hasRole('organizer')){
            return redirect('/organizer');
        }

        if(\Auth::user()->hasRole('juri')){
            return redirect('/juri');
        }

        if(\Auth::user()->hasRole('guru')){
            return redirect('/guru');
        }

        if(\Auth::user()->hasRole('peserta')){
            return redirect('/peserta');
        }

        return redirect('/lombaku');

        
    }
}
