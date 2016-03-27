<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Events_Comments extends Model {

    protected $table = "event-comments";

    protected $fillable = ["id","text","event_id","user_id"];

    public function event(){
        return $this->belongsTo("App\Events","event_id");
    }



}
