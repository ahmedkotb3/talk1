<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('article-comments', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('article_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->string("text");
            $table->timestamps();
        });

        Schema::table("article-comments" , function(Blueprint $table){
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
		Schema::drop("article-comments");
	}

}
