<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        User::factory(10)->create([
            'name' => 'Test User',
            'role' => 'admin',
            'email' => 'test@example.com',
            'password'=> '12345678'
       ]);
    }
}
