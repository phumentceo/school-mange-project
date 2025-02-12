<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
          [
            "first_name" => 'Pot',
            "last_name" => 'Phument',
            "email" => 'phument@gmail.com',
            "phone" => '034567890',
            "password" => Hash::make("phument"),
            "created_at" => now(),
            "updated_at" => now(),
          ],
          [
            "first_name" => 'Yat',
            "last_name" => 'Yandy',
            "email" => 'yandy@gmail.com',
            "phone" => '045567890',
            "password" => Hash::make("yandy"),
            "created_at" => now(),
            "updated_at" => now(),
          ],
          [
            "first_name" => 'admin',
            "last_name" => 'admin',
            "email" => 'admin@gmail.com',
            "phone" => '01234667',
            "password" => Hash::make("admin"),
            "created_at" => now(),
            "updated_at" => now(),
          ]
        ];


        DB::table('admins')->insert($admins);


    }
}
