<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function __construct(){
    	$this->middleware('auth',['except' => 'getLogout']);
    }
    public function getIndex(){
    	return view('home');
    }
    public function getLogout(){
    	Auth::logout();
    	return redirect(\URL::previous());
    }
}