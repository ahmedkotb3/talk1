<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Session\Session;

class UserController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
//		return view('register');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

	public function validate_inputs($inputs)
	{
		$validator = Validator::make(
				$inputs,
				[
						'arabic_name' => "required",
						'email' => "required|unique:users|email",
						'password' => "required"
				]
		);


		if ($validator->fails()) {

			return "false";

		} else {

			return "true";
		}
	}

	public function store()
	{
		$inputs = Input::all();
		$password = Input::get('password');
		$re_password = Input::get('re_password');
		$encrypt_password = Hash::make(Input::get('password'));

		if ($this->validate_inputs($inputs)) {
			if ($password === $re_password) {
				User::save_user(Input::get('arabic_name'), Input::get('english_name'), Input::get('email'), $encrypt_password, "", Input::get('country'), Input::get('work'),
						Input::get('date'), "user", Input::get('_token'));
			}
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function login()
	{

		$email = Input::get('email');
		$password = Input::get('password');

		$user = User::where('email', '=', $email)->get()->first();
		if ($user->role == "admin") {
			if (Auth::attempt(array('email' => $email, 'password' => $password))) {
				return redirect('/slider');
			} else {
				return view('login');
			}

		} else {
			if (Auth::attempt(array('email' => $email, 'password' => $password))) {
				return redirect('/personalPage');
			} else {
				return redirect('/login');
			}

		}

	}


//	public function edit_profile_pic($id){
//
//		$image = Input::file('image');
//
//
//		$destinationPath = "/uploadfiles/user_photo/" . $id;
//
//		if (!file_exists($destinationPath)) {
//			mkdir($destinationPath);
//		}
//		if(empty(Auth::user()->$image)){
//
//			if (!empty($image)) {
//
//				$image_name = $image->getClientOriginalName();
//
//				if ($image->move($destinationPath, $image_name)) {
//					$user_pic = User::find($id);
//					$user_pic->image = $image_name;
//					$user_pic->save();
//				}
//
//			}
//
//		}else{
//			unlink($destinationPath . Auth::user()->$image);
//			if (!empty($image)) {
//
//				$image_name = $image->getClientOriginalName();
//
//				if ($image->move($destinationPath, $image_name)) {
//					$user_pic = User::find($id);
//					$user_pic->image = $image_name;
//					$user_pic->save();
//				}
//
//			}
//		}
//
//
//	}

//	public function changePassword($id)
//	{
//		$password =  Auth::user()->password;
//		$oldpassword = Input::get('old_password');
//		$newpassword = Input::get('new_password');
//		if(Hash::check($oldpassword,$password)){
//			$user = User::find($id);
//			$user->password=$newpassword;
//			$user->save;
//
//
//	}


//	public function change_user_data($id){
//		$token = csrf_token();
//		$english_name="hanodaa";
//		$email="hanodaa@gmail.com";
//		$phone="123456789";
//		$work="marketing";
//		$country="cairo";
//
//	}
}
//}

//	public function portfile(){
//
//		return "
//	}

//	public function update_user($id){
//
//		return User::find($id);
//		$english_name="hanodaa";
//		$email="hanodaa@gmail.com";
//		$phone="123456789";
//		$work="marketing";
//		$country="cairo";
//
//		User::update_user($id,$english_name,$email,$phone,$country,$work);
//
//	}
//}
