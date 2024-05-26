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
        $admin = User::create([
            'name' => 'Head of Health Center',
            'email' => 'hohc@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $admin->assignRole('pengguna');
    }
}
