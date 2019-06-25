<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\HerokuApi as HerokuApi;


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
        $config_variables = (new HerokuApi)->init()->get('apps/jyotiucreate/config-vars');
        return view('home')->with('config_variables',$config_variables);
    }
    public function updateConfigVars(Request $request)
    {
      
        $config_variables = (new HerokuApi)->init()->patch('apps/jyotiucreate/config-vars', $request->all());
        if($config_variables){
            return redirect()->back()->with('message', 'IT WORKS!');
        }
        echo '<pre>';
        print_r($config_variables);
        exit;
    }
}
