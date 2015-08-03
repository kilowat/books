<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('publications', function (Blueprint $table) {
    		$table->increments('id');
    		$table->integer('user_id')->unsigned();
    		//$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    		$table->integer('category_id');
    		//$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
    		$table->string('name');
    		$table->string('image');
    		$table->integer('rang');
    		$table->integer('see_count');
    		$table->text('description');
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
        Schema::drop('publications');
    }
}
