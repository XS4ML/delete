<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganisedEventsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('organised_events', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->text('description');
      $table->string('venue');
      $table->enum('category', ['sport', 'culture', 'other']);
      $table->dateTime('starting_at');
      $table->integer('organiserId')->unsigned()->references('id')->on('users');
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
    Schema::dropIfExists('organised_events');
  }
}
