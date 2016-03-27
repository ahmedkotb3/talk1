<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventSpeechesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('event-speeches', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('event_id')->unsigned()->index();
            $table->string('title');
            $table->string('desc');
            $table->string('youtube_url');
            $table->string('image');
            $table->string('title_en');
            $table->string('desc_en');
            $table->string('youtube_url_en');
            $table->timestamps();
        });

        Schema::table("event-speeches" , function(Blueprint $table){
            $table->foreign("event_id")->references("id")->on("events")->onDelete("cascade");
        });

    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('event-speeches');
	}

}
