<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("posts", function(Blueprint $table){
            $table->increments("id");
            $table->integer("parent")->default(0);
            $table->integer("user_id");
            $table->integer("layout_id");
            $table->string("slug");
            $table->string("title");
            $table->longtext("content")->nullable();
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
        Schema::drop('posts');
    }
}
