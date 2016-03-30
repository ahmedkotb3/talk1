<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('articles', function(Blueprint $table)
        {
            $table->increments('id');
//            $table->integer('user_id')->unsigned()->index();
            $table->string("title");
            $table->string("subject");
            $table->string("video_url");
//            $table->string("audio_url");
            $table->string("picture_url");
			$table->string("title_en");
			$table->string("subject_en");
			$table->string("video_url_en");
//            $table->string("audio_url");
			$table->string("picture_url_en");
            $table->string('type');
            $table->timestamps();
        });

//        Schema::table("articles" , function(Blueprint $table){
//            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
//        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('articles');
	}

}
