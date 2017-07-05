<?php

namespace App;
use DB;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Home extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
     public function registration($userData) 
     {
		$userquery = 0;
		$user = DB::table('sysUsers')->where('email', '=', $userData['email'])->first();
		if($user == NULL) {
			$userquery = DB::table('sysUsers')->insertGetId(array('email' => $userData['email'] , 'password' =>  bcrypt($userData['password']),'sysStatus' => 'active'));
		}
		return $userquery;
	 }
}
