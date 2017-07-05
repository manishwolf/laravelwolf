<?php
namespace App\Http\Controllers;
//use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Redirect;
use Validator;
use App\Book;

use Route;
use Request;
use DB;
use Illuminate\Support\Facades\Input;
//use Paginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
class UserController extends Controller {
	public function __construct()
	{
		if(Session::get('isLoggedIn') != 1) {
			Redirect::to('/')->send();
		}
	}
	public function home() {
		
		$segment=Input::get('page') ;
		if(isset($segment) && $segment != '') {
			$page =$segment;
		} else {
			$page =0;
		}
		$data['title'] = 'viewBook';
		$book = new Book;
		$numBook = 10;
		if($page == 0) {
			$offset = 0;
		} else {
			$offset = ($page -1) * $numBook;
		}
		$data['countAllBooks'] = $book->__allBooks();
		$data['getAllBooks'] = $book->__allBooksLimit($numBook,$offset);
		$totalBook = count($data['countAllBooks']);
		$data['paginator'] = new LengthAwarePaginator(
		  $data['getAllBooks'], 
		  $totalBook, 
		  $numBook, 
		  Paginator::resolveCurrentPage(), 
		  ['path' => Paginator::resolveCurrentPath()]);
		//~ echo $paginator;die;
		//echo"<pre>";print_r($data['paginator']);die;
		$data['content'] = view('user/viewBook',$data);
		return view('user/mainTemplate',$data);
	}
	
	public function addBook() {
		$data['title'] = 'addBook';
		if (Input::isMethod('post'))
		{
			$bookData =array();
			$bookData = Input::all();
			$data['bookName']		= $bookData['bookName'];
			$data['category']		= $bookData['category'];
			$data['publishBy']		= $bookData['publishBy'];
			$data['desc']			= $bookData['desc'];
			$rules =array(
				'bookName' => 'required',
				'category' => 'required',
				'publishBy' => 'required',
				'desc' => 'required'
			 );
			$validator = Validator::make($data, $rules);
			if ($validator->fails())
			{	return Redirect::to('/addBook')->with('msgInfo',$validator->errors()->all());
				exit;
			} else {
				$book = new Book;
				$insert_Id = $book->__addBook($data);
				if(isset($insert_Id) && $insert_Id != 0) {
					Session::flash('successMsg','Book is added  successfully.');
					return redirect('/home');
				} else {
					Session::flash('errorMsg','Error to add book.');
					return redirect('/addbook');
				}
			}
			Redirect::to('/addbook')->send();
		}

		$data['content'] = view('user/addBook',$data);
		return view('user/mainTemplate',$data);
	}
	
	public function editbook() 
	{	
		$itemID = Request::segment(2);
		if(!isset($itemID) || $itemID == '') {
			Redirect::to('/home')->send();
		}
		$book = new Book;
		$data['title'] = 'viewBook';
		$data['itemID'] = $itemID;
		if (Input::isMethod('post'))
		{
			$bookData =array();
			$bookData = Input::all();
			$data['bookName']		= $bookData['bookName'];
			$data['category']		= $bookData['category'];
			$data['publishBy']		= $bookData['publishBy'];
			$data['desc']			= $bookData['desc'];
			$rules =array(
				'bookName' => 'required',
				'category' => 'required',
				'publishBy' => 'required',
				'desc' => 'required'
			 );
			$validator = Validator::make($data, $rules);
			if ($validator->fails())
			{	return Redirect::to('/home')->with('msgInfo',$validator->errors()->all());
				exit;
			} else {
				$insert_Id = $book->__editBook($data ,$itemID);
				if($insert_Id) {
					Session::flash('successMsg','Book is edit  successfully.');
					return redirect('/home');
				} else {
					Session::flash('errorMsg','Error to editbook.');
					return redirect('/editbook');
				}
			}
			Redirect::to('/editbook')->send();
		} else {
			$data['editBookData'] = $book->__getBook($data['itemID']);
			if(count($data['editBookData']) <= 0) {
				return redirect('/home');
			}
			$data['content'] = view('user/editBook',$data);
			return view('user/mainTemplate',$data);
		}
	}
	public function deletebook() 
	{	
		$itemID = Request::segment(2);
		if(!isset($itemID) || $itemID == '') {
			Session::flash('errorMsg','Please select a vaild book.');
			Redirect::to('/home')->send();
		}
		$book = new Book;
		$insert_Id = $book->__deleteBook($itemID);
		if($insert_Id) {
			Session::flash('successMsg','Book is deleted  successfully.');
			return redirect('/home');
		} else {
			Session::flash('errorMsg','Error to delete book.');
			return redirect('/home');
		}
	}
	public function logout() {
		Session::flush();
		return redirect('/');
	}
}
?>
