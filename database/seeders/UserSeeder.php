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
            'name' => 'client1',
            'email' => 'client1@gmail.com',
            'password' => 'password',
            'status' => 'active'
        ]);

        User::insert([
            'name' => 'client2',
            'email' => 'client2@gmail.com',
            'password' => 'password',
        ]);
    }
}
