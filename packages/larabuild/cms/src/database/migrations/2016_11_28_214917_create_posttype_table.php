<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosttypeTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create("post_type", function(Blueprint $table){
      $table->increments("id");
      $table->string("slug");
      $table->string("title");
      $table->string("description")->default("");
      $table->longtext("properties");
      $table->longtext("admin_layout");
      $table->string("view")->default("");;
      $table->timestamps();
    });

    Schema::table("posts", function(Blueprint $table){
      $table->integer('type_id')->nullable();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::drop('post_types');
    Schema::table("posts", function(Blueprint $table){
      $table->dropColumn('type_id');
    });
  }
}
