<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'jinnah';
        $user->user_name = 'jinnah';
        $user->email = 'jinnahpiplan@gmail.com';
        $user->password = bcrypt('jinnah123');
        $user->save();
    }
}
