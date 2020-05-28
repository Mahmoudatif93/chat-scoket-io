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
        $user=\App\User::create([
        
        'name'=>'super',
        'email'=>'ahmed@yahoo.com',
        'password'=>bcrypt('123456'),
        
        ]);
        $user->attachRole('super_admin');
        //factory(App\User::class,300)->create();

    }
}
