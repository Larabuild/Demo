<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create("settings", function(Blueprint $table){
      $table->increments("id");
      $table->string("bundle");
      $table->string("name");
      $table->longtext("value");
      $table->string("title");
      $table->string("description");
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
    Schema::drop('settings');
  }
}
