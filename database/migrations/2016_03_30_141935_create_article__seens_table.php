<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleSeensTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article__seens', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('article_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
			$table->integer("seen_status");
			$table->timestamps();
		});
		Schema::table("article__seens" , function(Blueprint $table) {
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
		Schema::drop('article__seens');
	}

}
