<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Votes extends Model {

    protected $table ="votes";

    protected $fillable = ["status","question"];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * return vote answers
     */
    public function answers(){
        return $this->hasMany("App\Vote_Answers","vote_id");
    }

}
