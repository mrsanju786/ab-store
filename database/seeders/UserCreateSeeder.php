<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserCreateSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Admin',
            'last_name'  => 'Admin',
            'phone'      => '7891565091',
            'email'      => 'admin@gmail.com',
            'password'   =>bcrypt(123456),
            'email_verified_at' =>"2023-03-11 09:13:42",
            'created_at'  =>"2023-03-11 09:13:42",
            'updated_at'  => "2023-03-11 09:13:42" 
        ]);
    }
}
