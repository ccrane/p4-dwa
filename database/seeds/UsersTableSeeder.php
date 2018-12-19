<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::updateOrCreate(
            ['email' => 'joe@harvard.edu', 'name' => 'Joe Harvard', 'role' => 'admin'],
            ['password' => Hash::make('helloworld')]
        );

        $user = User::updateOrCreate(
            ['email' => 'jill@harvard.edu', 'name' => 'Jill Harvard', 'role' => 'standard'],
            ['password' => Hash::make('helloworld')]
         );

        $user = User::updateOrCreate(
            ['email' => 'jamal@harvard.edu', 'name' => 'Jamal Harvard', 'role' => 'standard'],
            ['password' => Hash::make('helloworld')]
        );
    }
}
