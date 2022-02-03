<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIeventCommentsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('ievent__comments', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('id');
      
      $table->integer('user_id')->unsigned();
      $table->foreign('user_id')
        ->references('id')
        ->on('users')
        ->onDelete('cascade');
  
      $table->integer('event_id')->unsigned();
      $table->foreign('event_id')
        ->references('id')
        ->on('ievent__events')
        ->onDelete('cascade');
      
      $table->text('message');
      
      // Your fields
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
    Schema::dropIfExists('ievent__comments');
  }
}