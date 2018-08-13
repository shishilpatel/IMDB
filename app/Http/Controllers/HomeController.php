<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use IMDB;
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
        return view('home');
    }
    
    public function movie(Request $request){
        $client = new \IMDB("The Toxic Avenger");
        dd($client->getRating());
    }
}
