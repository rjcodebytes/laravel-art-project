<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'phone' => '9999999999',
            'password' => 'admin123', // will be bcrypt automatically
        ]);
    }
}
