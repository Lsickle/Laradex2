<?php

use Illuminate\Database\Seeder;
use App\role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $role_user = Role::where('name','user')->first();
        $role_admin = Role::where('name','admin')->first();
        $role_visitor = Role::where('name','visitor')->first();

        $user = new User();
        $user->name = 'User';
        $user->email = 'User@mail.com';
        $user->password = bcrypt('query');
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@mail.com';
        $user->password = bcrypt('query');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'visitor';
        $user->email = 'visitor@mail.com';
        $user->password = bcrypt('query');
        $user->save();
        $user->roles()->attach($role_visitor);
    }
}
