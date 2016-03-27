<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pictures', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('album_id')->unsigned()->index();
			$table->string('images');
			$table->string('images_en');
			$table->timestamps();
		});

		Schema::table("pictures" , function(Blueprint $table){
			$table->foreign("album_id")->references("id")->on("albums")->onDelete("cascade");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pictures');
	}

}
