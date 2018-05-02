<?php

use Illuminate\Database\Seeder;
use App\Role;
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
        // Membuat Role Admin
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "Admin";
        $adminRole->save();

        // Membuat Role Member
        $memberRole = new Role();
        $memberRole->name = "member";
        $memberRole->display_name = "Member";
        $memberRole->save();

        // Membuat Role Guru
        $guruRole = new Role();
        $guruRole->name = "guru";
        $guruRole->display_name = "Guru";
        $guruRole->save();

        // Membuat Sample Admin
        $admin = new User();
        $admin->name = "Admin";
        $admin->email = "admin@main.com";
        $admin->password = bcrypt('qweasd123');
        $admin->save();
        $admin->attachRole($adminRole);

        // Membuat Sample Member
        $member = new User();
        $member->name = "Member";
        $member->email = "member@main.com";
        $member->password = bcrypt('qweasd123');
        $member->save();
        $member->attachRole($memberRole);

        // Membuat Sample Guru
        $guru = new User();
        $guru->name = "Guru";
        $guru->email = "guru@main.com";
        $guru->password = bcrypt('qweasd123');
        $guru->save();
        $guru->attachRole($guruRole);
    }
}
