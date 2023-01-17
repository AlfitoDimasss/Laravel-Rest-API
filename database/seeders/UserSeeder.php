<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'password',
            'role_id' => 1,
            'status' => 'active'
        ]);

        User::insert([
            'name' => 'user-a',
            'email' => 'usera@gmail.com',
            'password' => 'password',
            'status' => 'active'
        ]);

        User::insert([
            'name' => 'user-b',
            'email' => 'userb@gmail.com',
            'password' => 'password',
        ]);
    }
}
