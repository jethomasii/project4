<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Bring this database up
        Schema::create('tasks', function (Blueprint $table) {

          # Create the basics
          $table->increments('id');
          $table->timestamps();

          # App specific fields
          $table->text('description');
          $table->boolean('complete');
          #$table->timestamp('due');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // drop this Database
        Schema::drop('tasks');
    }
}
