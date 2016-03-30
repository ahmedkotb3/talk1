<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pictures extends Model {

    protected $table ="pictures";

    protected $fillable = ["album_id","images"];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * return associated album
     */
    public function album(){
        return $this->belongsTo("App\Albums","album_id");
    }

    public static function add_pics_to_album($album_id,$images){

        $pictures = new Pictures;
        $pictures->album_id=$album_id;
        $pictures->images=$images;
        $pictures->save();

    }

    public static function edit_pic_to_album($id,$album_id,$images){

        $pictures = Pictures::find($id);
        $pictures->album_id=$album_id;
        $pictures->images=$images;
        $pictures->save();

    }
}
