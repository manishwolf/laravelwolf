<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthController as authControllers;
use Session;
use View;
use Validator;
use Auth;
use Request;
use App\Home;
use Redirect;
use Illuminate\Support\Facades\Input;
class Login extends Controller
{
	public function __construct()
	{
		if(Session::get('isLoggedIn') == 1) {
			Redirect::to('/home')->send();
		}
	}
	public function index() {
		if(Input::has('login')) {
			$userData = Input::all();
			$data['email'] = $userData['email'];
			$data['password'] = $userData['password'];
			$rules =array(
				'email' => 'required|email|max:255',
				'password' => 'required|min:5',
			);
			$validator = Validator::make($data, $rules);
			if ($validator->fails()) {
				return Redirect::to('/')->with('msgInfo',$validator->errors()->all());
				exit;
			} else {
				if(auth::attempt(['email' => $userData['email'] , 'password' => $userData['password']])) {
					Session::put('isLoggedIn' ,1);
					Session::put('email' ,$userData['email']);
					Session::flash('successMsg','Login successfully , Welcome. ');
					return redirect('/home');
				} else {
					Session::flash('errorMsg','Invalid email or password.');
					return redirect('/');
				}
			}
		}
		return view('loginView');
	}
	public function registration() {
		if (Request::isMethod('post'))
		{ 
			$userData =array();
			$userData = Input::all();
			$data['name']		= $userData['name'];
			$data['email']		= $userData['email'];
			$data['password']	= $userData['password'];
			$data['cpassword']	= $userData['cpassword'];
			$rules =array(
				'name' => 'required|max:255',
				'email' => 'required|email|max:255|unique:sysUsers',
				'password' => 'required|min:3',
				'cpassword' => 'same:password'
			 );
			$validator = Validator::make($data, $rules);
			if ($validator->fails())
			{	return Redirect::to('registration')->with('msgInfo',$validator->errors()->all());
				exit;
			}else {
				$home = new Home;
				$insert_Id = $home->registration($data);
				if(isset($insert_Id) && $insert_Id != 0) {
					Session::flash('successMsg','Registration successfully.');
					return redirect('/');
				} else {
					Session::flash('errorMsg','Email address already exist.');
					return redirect('/registration');
				}
			}
		} else {
			return view('register');
		}
	}
	
}
