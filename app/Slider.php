<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model {

    protected $table ="sliders";

    protected $fillable = ["description","image"];

    public static function save_slider($description,$image){

        $slider = new Slider;
        $slider->description = $description;
        $slider->image = $image;
        $slider->save();

    }
    public static function update_slider($id,$description,$image){

        $slider = Slider::find($id);
        $slider->description = $description;
        $slider->image = $image;
        $slider->save();
    }

}
