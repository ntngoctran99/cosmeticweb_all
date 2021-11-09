<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'username' => 'customer',
                'password' => Hash::make('123456789'),
                'type' => 0,
                'fullname'  => 'customer',
                'phone_number'  => '0912345678',
                'gender'    => 0,
                'address'   =>  'C8x Bình Dương',
                'email' =>  'customer@gmail.com'
            ],
            [
                'username' => 'customer1',
                'password' => Hash::make('123456789'),
                'type' => 0,
                'fullname'  => 'customer1',
                'phone_number'  => '0912345678',
                'gender'    => 0,
                'address'   =>  'Tân Bình',
                'email' =>  'customer1@gmail.com'
            ],
            [
                'username' => 'staff',
                'password' => Hash::make('123456789'),
                'type' => 1,
                'fullname'  => 'staff',
                'phone_number'  => '0912345678',
                'gender'    => 0,
                'address'   =>  'HCM',
                'email' =>  'staff@gmail.com'
            ]
        ];
        // Delete and Reset Table
        DB::table('users')->delete();
        DB::statement("ALTER TABLE `users` AUTO_INCREMENT = 1");
        // Insert into table
        DB::table('users')->insert($users);
    }
}
