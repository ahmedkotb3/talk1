<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article_Likes extends Model {
    protected $table = "article__likes";

    protected $fillable = ["user_id","like_status","article_id"];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * return article related to this comment
     */
    public function article(){
        return $this->belongsTo("App\Article","article_id");
    }


}
