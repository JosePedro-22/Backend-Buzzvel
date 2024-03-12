<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): array
    {
         $user = User::factory()->create();

         return [
             'email' => $user->email,
             'password' => 'password',
         ];
    }
}
