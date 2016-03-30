<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

    protected $table = "articles";

    protected $fillable = ["title","subject","video_url","picture_url"];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * return user who wrote this article
     */
//    public function user(){
//        return $this->belongsTo("App\User","user_id");
//    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * return comments related to article
     */
    public function comments(){
        return $this->hasMany("App\Article_Comments","article_id");
    }

    public function likes(){
        return $this->hasMany("App\Article_Likes","article_id");
    }
    public function seens(){
        return $this->hasMany("App\Article_Seen","article_id");
    }
    /* add new article to database */
    public static function add_article($title,$subject,$video_url,$picture_url){

        $article = new Article;
        $article->title=$title;
        $article->subject=$subject;
        $article->video_url=$video_url;
        $article->picture_url=$picture_url;
        $article->save();
    }

    /* update exiting article  */
    public static function edit_article($id,$title,$subject,$video_url,$picture_url){

        $article =Article::find($id);
        $article->title=$title;
        $article->subject=$subject;
        $article->video_url=$video_url;
        $article->picture_url=$picture_url;
        $article->save();
    }

}
