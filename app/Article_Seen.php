<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article_Seen extends Model {

    protected $table = "article__seens";

    protected $fillable = ["user_id","seen_status","article_id"];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * return article related to this comment
     */
    public function article(){
        return $this->belongsTo("App\Article","article_id");
    }

}
