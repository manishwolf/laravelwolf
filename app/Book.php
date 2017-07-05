<?php

namespace App;
use DB;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Book extends Authenticatable
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
     public function __addBook($userData) 
     {
		$userquery = 0;
		$userData['publishDate'] = date('Y-m-d');
		$userquery = DB::table('tblBooks')->insertGetId(array('bookName' => $userData['bookName'] ,'category' => $userData['category'] ,'desc' => $userData['desc'] ,'publishBy' => $userData['publishBy'] ,'publishDate' => $userData['publishDate'] ,'sysStatus' => 'active'));
		return $userquery;
	 }
     public function __editBook($userData,$itemID) 
     {
		$book = DB::table('tblBooks')->where('id', '=', $itemID)->first();
		if($book != NULL) {
			$userquery = 0;
			$userquery = DB::table('tblBooks')->where('id',$itemID)->update(array('bookName' => $userData['bookName'] ,'category' => $userData['category'] ,'desc' => $userData['desc'] ,'publishBy' => $userData['publishBy'] ));
			return true;
		 }
		 return false;
	 }
     public function __deleteBook($itemID) 
     {
		$book = DB::table('tblBooks')->where(array('id' => $itemID,'sysStatus' => 'active' ))->first();
		if($book != NULL) {
			$userquery = 0;
			$userquery = DB::table('tblBooks')->where('id',$itemID)->update(array('sysStatus' => 'inactive' ));
			return true;
		 }
		 return false;
	 }
     public function __getBook($itemID) 
     {
		$book =array();
		$book = DB::table('tblBooks')->where('id', '=', $itemID)->first();
		if($book != NULL) {
			return $book;
		 }
		 return false;
	}
	 
	 public function __allBooksLimit($perPage = 0 ,$offset = 0)
	{
		$data = array();
		$query=DB::table('tblBooks')->select('*')->where('sysStatus','=','active')->limit($perPage)->offset($offset)->get();
		if(count($query>0))
		{
			return $query;
		}
		return $data;
	}
	 public function __allBooks()
	{
		$data = array();
		$query=DB::table('tblBooks')->select('*')->where('sysStatus','=','active')->get();
		if(count($query>0))
		{
			return $query;
		}
		return $data;
	}
}
