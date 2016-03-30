<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Madcoda\Youtube\Facades\Youtube;

class YoutubeController extends Controller
{

    public function index()
    {
        //https://www.googleapis.com/youtube/v3/commentThreads?key=AIzaSyAsaksixbvwTyTdXuYoyooitplftJnDBSs&textFormat=plainText&part=snippet&videoId=0sQ2tPgdE9Y&maxResults=50
//$comments = array();
        $comments = file_get_contents('https://www.googleapis.com/youtube/v3/commentThreads?key=AIzaSyAsaksixbvwTyTdXuYoyooitplftJnDBSs&textFormat=plainText&part=snippet&videoId=sLwrG2bwBDI&maxResults=50');
//   $arr=explode(",",$comments);
        //$keywords = preg_split("/[\s,]+/", $comments);
        //return($keywords[4]);

//dd(Youtube::getVideoInfo(Input::get('vid', 'dQw4w9WgXcQ')));
        $response = json_decode($comments, true);

      $comment_number = count($response['items']);
        $comments = array();
        for($i=0;$i<$comment_number;$i++){
            $text = $response['items'][$i]['snippet']['topLevelComment']['snippet']['textDisplay'];
            $user_name = $response['items'][$i]['snippet']['topLevelComment']['snippet']['authorDisplayName'];
            $user_image = $response['items'][$i]['snippet']['topLevelComment']['snippet']['authorProfileImageUrl'];
           $comment = array(
                'user_name'=>$user_name,
                'user_iamge'=>$user_image,
                'text'=>$text,
            );

            array_push($comments,$comment);

        }
        return $comments;

//        echo "<pre>";
//        print_r($response['items']['3']['snippet']['topLevelComment']['snippet']['textDisplay']);
//        echo "</pre>";

    }
}