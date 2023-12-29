<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

   

    public function __construct(){
        $this->middleware('auth');
    }



    public function homeview(Request $request){

        // $request->session()->put(["Dima"=>"Edwin's Student"]);
        // session(['peter'=>'Student']);

        //$request->session()->forget('peter');
        //$request->session()->flush();
        //$request->session()->flash('message', 'Post has been created');

        return $request->session()->get('message');

        //return view('welcome');
    }
    
}
