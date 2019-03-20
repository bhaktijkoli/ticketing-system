<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('messages', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('ticket');
      $table->integer('created_by');
      $table->longtext('message');
      $table->enum('read', [0,1]);
      $table->string('files');
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
    Schema::dropIfExists('messages');
  }
}
