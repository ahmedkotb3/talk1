<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleLikesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article__likes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('article_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
			$table->integer("like_status");
			$table->timestamps();
		});
		Schema::table("article__likes" , function(Blueprint $table) {
			$table->foreign("article_id")->references("id")->on("articles")->onDelete("cascade");
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
		Schema::drop('article__likes');
	}

}
