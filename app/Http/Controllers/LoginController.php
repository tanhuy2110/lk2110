<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\MessageBag;
class LoginController extends Controller
{
    public function getLogin(){
    	return view('login');
    }
    public function postLogin(Request $request){
    	$rules =[
    		'email' => 'required|email',
    		'password'=> 'required|min:8'
    	];
    	$messages = [
    		'email.required' => 'Email la truong bat buoc',
    		'email.email' => 'Email phai dung dinh dang',
    		'password.required' => 'Password la truong bat buoc',
    		'password.min' => 'Password phai du 8 ky tu'
    	];
    	$validator = Validator::make($request->all(), $rules, $messages);
    	if($validator->fails()){
            return response()->json([
                'error' => true,
                'message' => $validator->errors()
            ],200);
    		//return  redirect()->back()->withErrors($validator)->withInput();
    	}else{
    		$email = $request->input('email');
    		$password = $request->input('password');

    		if( Auth::attempt(['email' => $email, 'password'=> $password], $request->has('remember'))){
                return response()->json([
                    'error' => false,
                    'message' => 'success'
                    ],200);
    			//return redirect()-> intended('/');
    		}else{
    			$errors = new MessageBag(['errorlogin'=> 'Email or Password khong dung']);
                return response()->json([
                    'error' => true,
                    'message' => $errors
                ],200);

    			//return redirect()-> back()->withInput()->withErrors($errors);
    		}
    	}
    }
}
