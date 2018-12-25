<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->name = "Mandip Tharu";
        $user->email = "mandip810@gmail.com";
        $user->username = "mandip";
        $user->password = bcrypt("mandip");
        $user->save();
    }
}
