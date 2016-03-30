<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Speech_Comments extends Model {


    protected $table ="speech-comments";

    protected $fillable = ["text","speech_id","user_id"];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * comments over speech return related speech
     */
    public function speech(){
        return $this->belongsTo("App\Event_Speeches","speech_id");
    }

}
