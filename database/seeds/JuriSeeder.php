<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class JuriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat role admin
        $adminRole = new Role();
        $adminRole->name = "juri";
        $adminRole->display_name = "Juri";
        $adminRole->save();

        $admin = new User();
        $admin->name = 'Admin Larapus';
        $admin->email = 'juri1@gmail.com';
        $admin->password = bcrypt('rahasia');
        $admin->save();
        $admin->attachRole($adminRole);

        $admin = new User();
        $admin->name = 'Admin Larapus';
        $admin->email = 'juri2@gmail.com';
        $admin->password = bcrypt('rahasia');
        $admin->save();
        $admin->attachRole($adminRole);

        $admin = new User();
        $admin->name = 'Admin Larapus';
        $admin->email = 'juri3@gmail.com';
        $admin->password = bcrypt('rahasia');
        $admin->save();
        $admin->attachRole($adminRole);
    }
}
