<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Redirect;
use Session;


use \App\Permissions;
use \App\Indicators;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logged = Auth::user();
        if(Permissions::permissaoAdministrador($logged)){
            return view('home')->with(['adm' => true]); 
        }

        if(Permissions::permissaoModerador($logged)){
            return view('home')->with(['mod' => true]); 
        }
        return view('home');
    }
}
