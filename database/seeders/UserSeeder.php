<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(30)->create()->each(function (User $user) {
            $user->assignRole('user');
        });

        User::firstOrCreate(
            ['email' => 'john@example.com'],
            [
                'name' => 'John Snow',
                'phone_number' => fake()->phoneNumber(),
                'password' => Hash::make('pass1234'),
                'avatar' => "https://ui-avatars.com/api/?name=" . 'John Snow',
                'country' => fake()->country,
            ]
        )->assignRole('admin');

        User::firstOrCreate(
            ['email' => 'michael@example.com'],
            [
                'name' => 'Michael Olive',
                'phone_number' => fake()->phoneNumber(),
                'password' => Hash::make('pass1234'),
                'avatar' => "https://ui-avatars.com/api/?name=" . 'John Snow',
                'country' => fake()->country,
            ]
        )->assignRole('user');
    }
}
