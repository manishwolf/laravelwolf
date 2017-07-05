<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Session;

class WelcomeController extends Controller
{
	public function __construct()
	{
		if(Session::get('isLoggedIn') != 1) {
			Redirect::to('/')->send();
		}
	}
	public function home() {
		$data['dd'] = 'hello';
		return view('user/mainTemplate',$data);
	}
}
