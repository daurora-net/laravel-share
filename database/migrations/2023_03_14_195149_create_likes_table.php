<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
 /**
  * Run the migrations.
  *
  * @return void
  */
 public function up()
 {
  Schema::create('likes', function (Blueprint $table) {
   $table->id();
   $table->string('user_id');
   $table->bigInteger('post_id')->unsigned();
   $table->timestamps();
   $table->unique(['user_id', 'post_id']);
  });
 }

 /**
  * Reverse the migrations.
  *
  * @return void
  */
 public function down()
 {
  Schema::dropIfExists('likes');
 }
}