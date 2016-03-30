<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Madcoda\Youtube\Facades\Youtube;

class YoutubeController extends Controller
{

    public function index()
    {
        //https://www.googleapis.com/youtube/v3/commentThreads?key=AIzaSyAsaksixbvwTyTdXuYoyooitplftJnDBSs&textFormat=plainText&part=snippet&videoId=0sQ2tPgdE9Y&maxResults=50
//$comments = array();
        $comments = file_get_contents('https://www.googleapis.com/youtube/v3/commentThreads?key=AIzaSyAsaksixbvwTyTdXuYoyooitplftJnDBSs&textFormat=plainText&part=snippet&videoId=0sQ2tPgdE9Y&maxResults=50');
//   $arr=explode(",",$comments);
        //$keywords = preg_split("/[\s,]+/", $comments);
        //return($keywords[4]);

//dd(Youtube::getVideoInfo(Input::get('vid', 'dQw4w9WgXcQ')));
        $response = json_decode($comments, true);

      $comment_number = count($response['items']);
        $comments = array();
        for($i=0;$i<$comment_number;$i++){
        $comment = $response['items'][$i]['snippet']['topLevelComment']['snippet']['textDisplay'];
            array_push($comments,$comment);

        }
        return $comments;

//        echo "<pre>";
//        print_r($response['items']['3']['snippet']['topLevelComment']['snippet']['textDisplay']);
//        echo "</pre>";

    }
}