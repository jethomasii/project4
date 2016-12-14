<?php

use Illuminate\Database\Seeder;
use project4\User;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // make tasks for jill
        $user_id= User::where('email','=','jill@harvard.edu')->pluck('id')->first();

        DB::table('tasks')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'description' => 'Start project 4',
          'complete' => 1,
          'user_id' => $user_id,
        ]);

        DB::table('tasks')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'description' => 'Finish project 4',
          'complete' => 0,
          'user_id' => $user_id,
        ]);
    }
}
