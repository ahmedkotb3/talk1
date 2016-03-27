<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model {

    protected $table = "events";

    protected $fillable = ["name","image","place","facebook_link","twitter_link","date","day","description","PDF"];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * return comments on this event
     */
    public function comments(){
        return $this->hasMany("App\Events_Comments","event_id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * return pictures of this event
     */
     public function pictures(){
        return $this->hasMany("App\Event_Pictures","event_id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * many to many relationship has many users attenders
     */
    public function attenders(){
        return $this->belongsToMany("App\User","event-attenders","event_id","user_id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * return event speeches
     */
    public function speeches(){
        return $this->hasMany("App\Event_Speeches","event_id");
    }

    /* save event into database */
    public static function save_event($name,$image,$place,$facebook_link,$twitter_link,$date,$day,$description,$PDF){

        $event = new Events;
        $event->name = $name;
        $event->image = $image;
        $event->place = $place;
        $event->facebook_link = $facebook_link;
        $event->twitter_link = $twitter_link;
        $event->date = $date;
        $event->day = $day;
        $event->description = $description;
        $event->PDF = $PDF;
        $event->save();
    }

    /* update the exiting event */
    public static function update_event($id,$name,$image,$place,$facebook_link,$twitter_link,$date,$day,$description,$PDF){

        $event = Events::find($id);
        $event->name = $name;
        $event->image = $image;
        $event->place = $place;
        $event->facebook_link = $facebook_link;
        $event->twitter_link = $twitter_link;
        $event->date = $date;
        $event->day = $day;
        $event->description = $description;
        $event->PDF = $PDF;
        $event->save();

    }

    /* convert the date to day and convert it from English to Arabic */
   public static function convert($date){

       if(date('D', strtotime($date))=='Sat'){

           $day = "السبت";

       }elseif(date('D', strtotime($date))=='Sun'){

           $day = "الأحد";

       }elseif(date('D', strtotime($date))=='Mon'){

           $day = "الإثنين";

       }elseif(date('D', strtotime($date))=='Tue'){

           $day = "الثلاثاء";

       }elseif(date('D', strtotime($date))=='Wed'){

           $day = "الأربعاء";

       }elseif(date('D', strtotime($date))=='Thu'){

           $day = "الخميس";

       }elseif(date('D', strtotime($date))=='Fri'){

           $day = "الجمعة";

       }else{

           $day = "";
       }
       return $day;

   }

}
