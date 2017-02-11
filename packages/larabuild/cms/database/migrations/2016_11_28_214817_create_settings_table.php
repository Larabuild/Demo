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
    Schema::create("cms_settings", function(Blueprint $table){
      $table->increments("id");
      $table->string("bundle");
      $table->string("name");
      $table->longtext("value")->nullable();
      $table->string("label");
      $table->string("subtext")->default("");
      $table->string("placeholder")->default("");
      $table->string("input_type")->default("text");
      $table->text("validations")->nullable();
      $table->integer("is_hidden")->default(0);
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
    Schema::drop('cms_settings');
  }
}
