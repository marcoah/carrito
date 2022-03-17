<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->username = 'marcoah';
        $user->firstname = 'Marco';
        $user->lastname = 'Hernandez';
        $user->password = Hash::make('marcoa1*');
        $user->email = 'marcoah@gmail.com';
        $user->save();
        $user->assignRole('super-admin');
    }
}
