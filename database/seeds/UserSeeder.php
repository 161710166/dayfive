<?php

use Illuminate\Database\Seeder;
use App\Role;
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
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "admin";
        $adminRole->save();

        //membuat role mwmber
        $memberRole = new Role();
        $memberRole->name = "member";
        $memberRole->display_name = "member";
        $memberRole->save();

        //membuat sample admin
	 	$admin = new user();
 		$admin->name = "Admin";
 		$admin->email = 'admin@gmail.com';
	 	$admin->password = bcrypt ("rahasia");
	 	$admin->save();
 		$admin->attachRole($memberRole);

        //membuat sample member
	 	$member = new user();
 		$member->name = "Sample Member";
 		$member->email = 'member@gmail.com';
	 	$member->password = bcrypt ("rahasia");
	 	$member->save();
 		$member->attachRole($memberRole);
       
    }
}
