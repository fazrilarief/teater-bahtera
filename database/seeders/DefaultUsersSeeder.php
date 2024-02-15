<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'username' => 'admin',
                'email' => 'admin@example.com',
                'role' => 'admin',
                'password' => bcrypt('admin123'),
            ],
            [
                'username' => 'member',
                'email' => 'member@example.com',
                'role' => 'member',
                'password' => bcrypt('member123'),
            ],
            [
                'username' => 'coach',
                'email' => 'coach@example.com',
                'role' => 'coach',
                'password' => bcrypt('coach123'),
            ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
