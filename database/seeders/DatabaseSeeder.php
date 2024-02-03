<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Administrator',
            'email' => 'umar.ovie@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('admin'),
            'thumbnail' => 'https://ik.imagekit.io/8zmr0xxik/user_QwNOYeWtQ.jpeg?updatedAt=1703139730717',
            'no_hp' => '6285230648617',
            'jenis_kelamin' => 'Laki-Laki'
        ]);
    }
}
