<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MyController extends Controller
{
	public function setCookie(){
		$response = new Response();
		$response->withCookie(
			'hoten',
			'laravel',
			0.2
			);
		echo "Da set Cookie";
		return $response;
	}
	public function getCookie(Request $request){
		echo "Cookie cua ban la: " ;
		return $request->cookie('hoten');
		
	}
	public function postFile(Request $requset){
		if($requset -> hasFile('myFile')){
			$file = $requset->file('myFile');
			if($file->getClientOriginalExtension('myFile') == "jpg"){
				$filename = $file -> getClientOriginalName('myFile');
				$file->move('img',$filename);
				echo "Upload File Compelete Name File :" .$filename ;
			}
			else{
				echo "khong được upload File.";
			}
		}
		else{
			echo "Khong co File";
		}
	}
}
