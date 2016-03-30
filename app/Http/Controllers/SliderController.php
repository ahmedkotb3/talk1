<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class SliderController extends Controller {

//	public function __construct()
//	{
//
//		$this->middleware('auth');
//
//
//
//	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sliders =  Slider::all();
		return View('admin.showSlider',array('sliders'=>$sliders));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.addSlider');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$description = Input::get('description');
		$image = Input::file('image');

		if(!empty($image)){

			$destinationPath = "uploadfiles/slider";

			$image_name = $image->getClientOriginalName();

			if($image->move($destinationPath, $image_name)){

				Slider::save_slider($description,$image_name);
			}
		}
		return redirect('/slider');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function delete_slider($id){

		$slider = Slider::find($id);
		$slider->delete();
		unlink("uploadfiles/slider/".$slider->image."");
	}

	public function update_slider($id){

		$slider = Slider::find($id);

		$description = Input::get('description');
		$image = Input::file('image');

		if(!empty($image)){

			unlink("uploadfiles/slider/".$slider->image."");

			$destinationPath = "uploadfiles/slider";

			$image_name = $image->getClientOriginalName();

			if($image->move($destinationPath, $image_name)){

				Slider::update_slider($id,$description,$image_name);
			}


		}else{

			Slider::update_slider($id,$description,$slider->image);
		}
		return redirect('/slider');
	}

}
