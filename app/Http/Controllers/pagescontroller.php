<?php namespace App\Http\Controllers;

use App\Event_Speeches;
use App\Events;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pagescontroller extends Controller
{


	public function index()
	{

		$sliders = Slider::all();
		return view('pages/home',array('sliders'=>$sliders));
	}

	public function tagmoatna()
	{
		$date = date("Y-m-d");
		 $year = strtok($date, '-');
		 $events = Events::all();
		$future_events = array();
		$last_events = array();
		$years = array();
		$eventnames_and_year = array();
		foreach($events as $event){
			array_push($years,strtok($event->date, '-'));
			$array = array(
				'year'=>strtok($event->date, '-'),
				'name'=>$event->name,
				'id'=>$event->id
			);
			array_push($eventnames_and_year,$array);
			if($event->date >=$date){
				array_push($future_events,$event);
			}else{
				array_push($last_events,$event);
			}
		}

		return view('pages/tagmoatna',array('years'=>array_unique($years),'eventnames_and_year'=>$eventnames_and_year,'future_events'=>$future_events,'last_events'=>$last_events));
	}

	public function joinus()
	{
		return view('pages/joinus');
	}

	public function tagmoatnaevent($id)
	{

		$date = date("Y-m-d");

		$events = Events::all();

		$years = array();

		$eventnames_and_year = array();

		$event_data = array();
		foreach($events as $event){
			if($event->id == $id){
				array_push($event_data,$event);
			}
			array_push($years,strtok($event->date, '-'));
			$array = array(
					'year'=>strtok($event->date, '-'),
					'name'=>$event->name,
					'id'=>$event->id
			);
			array_push($eventnames_and_year,$array);
		}
		 $vedioes = Events::find($id)->speeches;
		$pictures = Events::find($id)->pictures;
		$number_of_vedios = count($vedioes);
		$number_of_pictures = count($pictures);
		return view('pages/tagmoatna-event',array('event_data'=>$event_data,'years'=>array_unique($years),'eventnames_and_year'=>$eventnames_and_year,'vedioes'=>$vedioes,
				'number_of_vedios'=>$number_of_vedios,'pictures'=>$pictures,'number_of_pictures'=>$number_of_pictures));
	}

	public function tagmoatnavideos($id)
	{
		$events = Events::all();
		$years = array();
		$event_data = array();
		$eventnames_and_year = array();
		foreach($events as $event){
			if($event->id == $id){
				array_push($event_data,$event);
			}
			array_push($years,strtok($event->date, '-'));
			$array = array(
					'year'=>strtok($event->date, '-'),
					'name'=>$event->name,
					'id'=>$event->id
			);
			array_push($eventnames_and_year,$array);
		}
		$vedioes = Events::find($id)->speeches;
		return view('pages/tagmoatna-videos',array('years'=>array_unique($years),'eventnames_and_year'=>$eventnames_and_year,'event_data'=>$event_data,'vedioes'=>$vedioes));
	}
	public function tagmoatnavideoplay($id)
	{
		 $vedio = Event_Speeches::where('id','=',$id)->get()->first();
		 $event_of_vedio = Events::where('id','=',$vedio->event_id)->get()->first();
		$events = Events::all();
		$years = array();
		$event_data = array();
		$eventnames_and_year = array();
		foreach($events as $event){

			array_push($years,strtok($event->date, '-'));
			$array = array(
					'year'=>strtok($event->date, '-'),
					'name'=>$event->name,
					'id'=>$event->id
			);
			array_push($eventnames_and_year,$array);
		}
		return view('pages/tagmoatna-videoplay',array('years'=>array_unique($years),'eventnames_and_year'=>$eventnames_and_year,'event_of_vedio'=>$event_of_vedio,'vedio'=>$vedio));
	}
	public function tagmoatnapictures($id)
	{
		$events = Events::all();

		$years = array();
		$event_data = array();
		$eventnames_and_year = array();

		foreach($events as $event){
			if($event->id == $id){
				array_push($event_data,$event);
			}
			array_push($years,strtok($event->date, '-'));
			$array = array(
					'year'=>strtok($event->date, '-'),
					'name'=>$event->name,
					'id'=>$event->id
			);
			array_push($eventnames_and_year,$array);
		}

		$event = Events::find($id);
		  $pictures = $event->pictures;

		return view('pages/tagmoatna-pictures',array('pictures'=>$pictures,'event'=>$event,'years'=>array_unique($years),'eventnames_and_year'=>$eventnames_and_year));
	}
	public function OurWorld()
	{
		return view('pages/OurWorld');
	}

	public function OurWorldArticle()
	{
		return view('pages/OurWorld-Article');
	}
	public function OurWorldvideo()
	{
		return view('pages/OurWorld-video');
	}
	public function Gallery()
	{
		return view('pages/Gallery');
	}
	public function Galleryevent()
	{
		return view('pages/Gallery-event');
	}

	public function etkalemy(){
		return view('pages/etkalemy');
	}
	public function contactus(){
		return view('pages/contactus');
	}
	public function aboutus(){
		return view('pages/aboutus');
	}


	public function login(){
		return view('pages/login');
	}
	public function personalPage(){

			return view('pages/personal_page');


		}


	public function EditPersonalPage(){

			return view('pages/edit_personal_page');



	}

	public function showadmin()
	{

		if (Auth::check()) {
			if(Auth::user()->role == "admin"){
				return redirect('/slider');
			}

		} else {

			return view('admin.login');
		}


	}
}
