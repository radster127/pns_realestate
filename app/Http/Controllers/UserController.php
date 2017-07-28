<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;

class UserController extends Controller
{
	public function index(){

		return view('login');

	}

	public function checkUser(Request $request){

		$post = $request->json()->all();

		if(!isset($post['username']) || !isset($post['password'])){

			echo json_encode(array("status"	=> false));

		}
		else{

			if (Auth::attempt(['username' => $post['username'], 'password' => $post['password']])){ // verify user

				$user = new User;
				$userId = $user->where('username', "admin")->first()->id;
				
				$request->session()->put('user_id', 'userId');
				$request->session()->put('language', 'eng');
	            
	            echo json_encode(array("status"	=> true));
	        
	        }
	        else{

	        	echo json_encode(array("status"	=> false));

	        }

		}

	}

	public function logout(Request $request){

		$request->session()->forget('user_id');

		return redirect('login');
	}
}
