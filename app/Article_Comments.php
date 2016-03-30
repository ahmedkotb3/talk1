<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article_Comments extends Model {

    protected $table = "article-comments";

    protected $fillable = ["user_id","text","article_id"];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * return article related to this comment
     */
    public function article(){
        return $this->belongsTo("App\Article","article_id");
    }

}
