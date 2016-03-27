<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('events', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('name_en');
            $table->string('image');
            $table->string('image_en');
            $table->string('place');
            $table->string('place_en');
            $table->string('facebook_link', 60);
            $table->string('facebook_link_en', 60);
            $table->string('twitter_link', 60);
            $table->string('twitter_link_en', 60);
            $table->dateTime('date');
			$table->string('day');
			$table->string('day_en');
			$table->text('description');
			$table->text('description_en');
			$table->text('PDF');
			$table->text('PDF_en');
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('events');
	}

}
