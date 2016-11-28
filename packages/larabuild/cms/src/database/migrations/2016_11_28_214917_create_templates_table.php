<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create("templates", function(Blueprint $table){
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
      $table->integer('template_id')->nullable();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::drop('templates');
    Schema::table("posts", function(Blueprint $table){
      $table->dropColumn('template_id');
    });
  }
}
