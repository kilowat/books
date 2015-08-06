<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('comments', function (Blueprint $table) {
    		$table->increments('id');
    		$table->integer('user_id')->unsigned()->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    		$table->integer('publication_id')->foreign('publication_id')->references('id')->on('comments')->onDelete('cascade');
    		$table->text('message');
    		$table->boolean('active')->default(1);
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
     	Schema::drop('comments');
    }
}
