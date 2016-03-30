<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpeechCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('speech-comments', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('speech_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->string('text');
            $table->timestamps();
        });

        Schema::table("speech-comments" , function(Blueprint $table){
            $table->foreign("speech_id")->references("id")->on("event-speeches")->onDelete("cascade");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("speech-comments");
	}

}
