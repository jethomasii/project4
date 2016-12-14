<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /// Make it up
        Schema::create('task_tag', function(Blueprint $table) {

          // basics
          $table->increments('id');
          $table->timestamps();

          // Pivot info
          $table->integer('task_id')->unsigned();
          $table->integer('tag_id')->unsigned();

          // foregin keys
          $table->foreign('task_id')->references('id')->on('tasks');
          $table->foreign('tag_id')->references('id')->on('tags');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      // Drop it like it's bobby droptables
      Schema::drop('task_tag');
    }
}
