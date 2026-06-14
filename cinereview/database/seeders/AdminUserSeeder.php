<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         User::create([
        'name' => 'Admin',
        'email' => 'admin@cinereview.com',
        'password' => bcrypt('admin123'),
        'role' => 'admin'
        ]);
    }
}
