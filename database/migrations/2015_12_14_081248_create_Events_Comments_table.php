<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('event-comments', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('text');
            $table->integer('event_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->string('user_name');
            $table->string('user_image');
            $table->timestamps();
        });

        Schema::table("event-comments" , function(Blueprint $table){
            $table->foreign("event_id")->references("id")->on("events")->onDelete("cascade");
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
        Schema::drop('event-comments');
	}

}
