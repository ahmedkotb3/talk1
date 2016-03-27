<?php namespace App\Http\Controllers;

use App\Albums;
use App\Article;
use App\Article_Comments;
use App\Event_Pictures;
use App\Event_Speeches;
use App\Events;
use App\Events_Comments;
use App\Pictures;
use App\Speech_Comments;
use App\User;
use App\Vote_Answers;
use App\Votes;

class HomeController extends Controller {


	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('welcome');
	}

    public function get(){
        return Vote_Answers::with("vote")->get();
    }


}
