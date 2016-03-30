<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventPicturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('event-pictures', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('event_id')->unsigned()->index();
            $table->string('pic');
            $table->string('pic_en');
            $table->timestamps();
        });

        Schema::table("event-pictures" , function(Blueprint $table){
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
        Schema::drop('event-pictures');
	}

}
