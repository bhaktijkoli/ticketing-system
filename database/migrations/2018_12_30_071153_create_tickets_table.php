<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('tickets', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('created_by');
      $table->integer('enrolled_by')->default(-1);
      $table->string('subject');
      $table->string('token');
      $table->enum('status', [0,1])->default(1);
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
    Schema::dropIfExists('tickets');
  }
}
