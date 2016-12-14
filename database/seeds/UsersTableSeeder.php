<?php

use Illuminate\Database\Seeder;
use project4\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Users for P4
        $users = [
            ['jill@harvard.edu','jill','helloworld'], # <-- Required for P4
            ['jamal@harvard.edu','jamal','helloworld'] # <-- Required for P4
        ];

        # Get existing users to prevent duplicates
        $existingUsers = User::all()->keyBy('email')->toArray();

        # add users if they do not exist
        foreach($users as $user) {

          if (!array_key_exists($user[0],$existingUsers)) {
            $user= User::create([
              'email' => $user[0],
              'name' => $user[1],
              'password' => Hash::make($user[2]),
            ]);
          }
        }
    }
}
