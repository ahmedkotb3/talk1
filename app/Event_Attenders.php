<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_Attenders extends Model {

    protected $table = "event-attenders";

    protected $fillable = ["event_id","user_id"];

}
