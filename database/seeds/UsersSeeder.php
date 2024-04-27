<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersSeeder extends Seeder
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
        $adminRole->name = "admin";
        $adminRole->display_name = "Admin";
        $adminRole->save();

        // Membuat Organizer peserta
        $organizerRole = new Role();
        $organizerRole->name = "organizer";
        $organizerRole->display_name = "Organizer";
        $organizerRole->save();

        // Membuat role peserta
        $pesertaRole = new Role();
        $pesertaRole->name = "peserta";
        $pesertaRole->display_name = "Peserta";
        $pesertaRole->save();

        // Membuat role guru
        $guruRole = new Role();
        $guruRole->name = "guru";
        $guruRole->display_name = "Guru";
        $guruRole->save();

        // Membuat sample admin
        $admin = new User();
        $admin->name = 'Admin Larapus';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('rahasia');
        $admin->save();
        $admin->attachRole($adminRole);

        // Membuat sample peserta
        $peserta = new User();
        $peserta->name = "Peserta Member";
        $peserta->email = 'peserta@gmail.com';
        $peserta->password = bcrypt('rahasia');
        $peserta->save();
        $peserta->attachRole($pesertaRole);

        // Membuat sample peserta
        $guru = new User();
        $guru->name = "Guru Member";
        $guru->email = 'guru@gmail.com';
        $guru->password = bcrypt('rahasia');
        $guru->save();
        $guru->attachRole($guruRole);

         // Membuat sample organizer
         $organizer = new User();
         $organizer->name = "Organizer Member";
         $organizer->email = 'organizer@gmail.com';
         $organizer->password = bcrypt('rahasia');
         $organizer->save();
         $organizer->attachRole($organizerRole);
    }
}
