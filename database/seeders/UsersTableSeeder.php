<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Ricardo Ramirez',
            'email' => 'rikrdoramirez@hotmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
        ]);

        User::factory()->count(4)->create();
    }
}
