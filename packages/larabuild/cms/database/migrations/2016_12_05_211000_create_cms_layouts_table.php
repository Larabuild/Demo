<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsLayoutsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create("cms_layouts", function(Blueprint $table){
      $table->increments("id");
      $table->string("name");
      $table->string("table_name")->nullable();
      $table->string("title");
      $table->text("description")->nullable();
      $table->longtext("content")->nullable();
      $table->string("public_view")->default("single.default");
      $table->string("admin_view")->default("cms::single.default");
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
    Schema::drop('cms_layouts');
  }
}
