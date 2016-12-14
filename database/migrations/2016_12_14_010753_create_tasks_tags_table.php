<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Make it up
        Schema::create('tasks_tags', function(Blueprint $table) {

          // basics
          $table->increments('id');
          $table->timestamps();

          // Pivot info
          $table->integer('task_id');
          $table->integer('tag_id');
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
        Schema::drop('tasks_tags');
    }
}
