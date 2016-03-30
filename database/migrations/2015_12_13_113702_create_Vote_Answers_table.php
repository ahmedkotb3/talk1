<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoteAnswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('vote-answers', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('vote_id')->unsigned()->index();
            $table->string('answer');
            $table->integer('rate');
            $table->timestamps();
        });

        Schema::table("vote-answers",function(Blueprint $table){
            $table->foreign("vote_id")->references("id")->on("votes")->onDelete("cascade");
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("vote-answers");
	}

}
