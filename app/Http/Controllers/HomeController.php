<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use HerokuClient\Client as HerokuClient;


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
        $config_variables=[];
        $heroku = new HerokuClient([
            'apiKey' => env('HEROKU_API_KEY'), 
        ]);
        $config_variables = $heroku->get('apps/configapis/config-vars');
        return view('home')->with('config_variables',$config_variables);
    }
}
