<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_Pictures extends Model {

    protected $table = "event-pictures";

    protected $fillable = ["id","pic","event_id"];

    public function event(){
        return $this->belongsTo("App\Events","event_id");
    }

    /* add pictures to specified event */

    public static function add_event_pics($event_id,$pic){

        $event_pictures = new Event_Pictures;
        $event_pictures->event_id=$event_id;
        $event_pictures->pic=$pic;
        $event_pictures->save();
    }

    public static function edit_event_pics($id,$event_id,$pic){

        $event_pictures = Event_Pictures::find($id);
        $event_pictures->event_id=$event_id;
        $event_pictures->pic=$pic;
        $event_pictures->save();
    }
}
