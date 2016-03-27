<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_Speeches extends Model {

    protected $table = "event-speeches";

    protected $fillable = ["title","event_id","desc","youtube_url"];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * speech belong to one event
     */
    public function event(){
        return $this->belongsTo("App\Events","event_id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * get Speech Comments
     */
    public function comments(){
        return $this->hasMany("App\Speech_Comments","speech_id");
    }

    /* add vedios to specified event */

    public static function add_event_vedios($event_id,$title,$desc,$youtube_url){

        $event_speeches = new Event_Speeches;
        $event_speeches->event_id=$event_id;
        $event_speeches->title=$title;
        $event_speeches->desc=$desc;
        $event_speeches->youtube_url=$youtube_url;
        $event_speeches->save();

    }
}
