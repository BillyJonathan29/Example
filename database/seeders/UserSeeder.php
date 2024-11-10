<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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
        User::create([
            'name' => 'Billy Jonathan',
            'email' => 'billy@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'Admin'
        ]);

        User::create([
            'name' => 'Jonathan',
            'email' => 'jnth@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'User'
        ]);
    }
}
