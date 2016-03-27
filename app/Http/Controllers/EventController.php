<?php namespace App\Http\Controllers;

use App\Event_Pictures;
use App\Event_Speeches;
use App\Events;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

class EventController extends Controller {

	public function __construct()
	{

		$this->middleware('auth');

	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$events = Events::all();
		return view('admin.showTagamo3',array('events'=>$events));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View('admin/addTagamo3');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$image = Input::file('image');
		$place = Input::get('place');
		$title = Input::get('title');
		$date = Input::get('date');
		$description = Input::get('description');
		$facebook_link = Input::get('facebook_url');
		$twitter_link = Input::get('twitter_url');
//		$PDF = Input::get('pdf');
		$day = Events::convert($date);
		$destinationPath = "uploadfiles/events/".$title;

		if(!file_exists($destinationPath)){
			mkdir("uploadfiles/events/".$title);
		}

		if(!empty($image)){

			$image_name = $image->getClientOriginalName();
			if($image->move($destinationPath, $image_name)){

				Events::save_event($title,$image_name,$place,$facebook_link,$twitter_link,$date,$day,$description,"");
			}
		}
		return redirect('/event');
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

	public function delete_event($id){

		$event = Events::find($id);
		$event->attenders()->delete();
		$event->speeches()->delete();
		$event->pictures()->delete();
		$event->comments()->delete();
		$event->whereid($id)->delete();

		array_map('unlink', glob("uploadfiles/events/" .$event->name . "/*"));
//		unlink("uploadfiles/albums/" . $album->name);
		rmdir("uploadfiles/events/" . $event->name);
		return redirect('/event');

	}

	public function update_event($id){

		$event = Events::find($id);

		$image = Input::file('image');
		$title = Input::get('title');
		$date = Input::get('date');
		$place = Input::get('place');
		$description = Input::get('description');
		$facebook_link = Input::get('facebook');
		$twitter_link = Input::get('twitter');
//		$PDF = Input::get('pdf');
		$day = Events::convert($date);



		if($title !== $event->name){

			rename("uploadfiles/events/".$event->name,"uploadfiles/events/".$title);
			$destinationPath = "uploadfiles/events/".$title;

		}else{

			$destinationPath = "uploadfiles/events/".$event->name;
		}


		if(!empty($image)){

			unlink($destinationPath."/".$event->image);
			$image_name = $image->getClientOriginalName();
			if($image->move($destinationPath, $image_name)){
				Events::update_event($id,$title,$image_name,$place,$facebook_link,$twitter_link,$date,$day,$description,"");
			}
		}else{
			Events::update_event($id,$title,$event->image,$place,$facebook_link,$twitter_link,$date,$day,$description,"");
		}
		return redirect('/event');
	}

	public function add_pictures($event_id){

		$event = Events::find($event_id);

		$images = Input::file('images');

		if(!empty($images)){

			foreach ($images as $image) {

				$destinationPath = "uploadfiles/events/".$event->name;
				$image_name = $image->getClientOriginalName();

				if ($image->move($destinationPath, $image_name)) {

					Event_Pictures::add_event_pics($event_id,$image_name);

				}
			}
		}
		return redirect('show_images_and_vedios/'.$event_id);
	}

	public function add_vedios($event_id){

		$title = Input::get('title');
		$image = Input::get('image');
		$desc = Input::get('description');
		$youtube_url=Input::get('vedio');

		Event_Speeches::add_event_vedios($event_id,$title,$desc,$youtube_url,$image);
		return redirect('show_images_and_vedios/'.$event_id);

	}

	public function show_images_and_vedios($id){

		$event_name = Events::find($id)->name;

		$images = Events::find($id)->pictures;

		$vedios = Event_Speeches::where('event_id','=',$id)->get();

		return view('admin.eventImagesAndVedio',array('images'=>$images,'vedios'=>$vedios,'event_name'=>$event_name));


	}

	public function edit_image_of_event($id){

		$event_pic = Event_Pictures::find($id);
		$event= Events::find($event_pic->event_id);
		$image = Input::file('image');

		if(!empty($image)){

			unlink("uploadfiles/events/".$event->name."/".$event_pic->pic);

			$destinationPath = "uploadfiles/events/".$event->name;

			$image_name = $image->getClientOriginalName();

			if ($image->move($destinationPath, $image_name)) {

				Event_Pictures::edit_event_pics($id,$event->id,$image_name);

			}
		}
		return redirect('show_images_and_vedios/'.$event_pic->event_id);
	}
	public function delete_image_of_event($id){

		$event_pic = Event_Pictures::find($id);
		$event_name = Events::find($event_pic->event_id)->name;
		$event_pic->delete();
		unlink("uploadfiles/events/".$event_name."/".$event_pic->pic);
	}
	public function edit_vedio_of_event($id){

		$event_id = Event_Speeches::find($id)->event_id;
		$title = Input::get('title');
		$desc = Input::get('description');
		$youtube = Input::get('vedio');

		Event_Speeches::edit_event_vedios($id,$event_id,$title,$desc,$youtube);
		return redirect('show_images_and_vedios/'.$event_id);

	}
	public function delete_vedio_of_event($id){

		$event_vedio = Event_Speeches::find($id);

		$event_vedio->delete();

	}


}
