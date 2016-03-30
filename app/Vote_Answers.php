<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote_Answers extends Model {

    protected $table ="vote-answers";

    protected $fillable = ["answer","rate"];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * return vote answers
     */
    public function vote(){
        return $this->belongsTo("App\Votes","vote_id");
    }


}
