<?php
use Laravel_Repository\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $user1 = new User;
        $user1->name = 'Usuario_1';
        $user1->email = 'usuario1@test.com';
        $user1->password = Hash::make('1234');
        $user1->save();
        
        $user2 = new User;
        $user2->name = 'Usuario_2';
        $user2->email = 'usuario2@test.com';
        $user2->password = Hash::make('5678');
        $user2->save();
    }

}