<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model {

    protected $table ="albums";

    protected $fillable = ["name","image"];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * return album pictures
     */
    public function pictures(){
        return $this->hasMany("App\Pictures","album_id");
    }

    public static function add_album($name,$image){
        $album = new Albums;
        $album->name=$name;
        $album->image=$image;
        $album->save();

    }

    public static function edit_album($id,$name,$image){
        $album = Albums::find($id);
        $album->name=$name;
        $album->image=$image;
        $album->save();
    }

}
